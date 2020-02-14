<?php

declare(strict_types = 1);

namespace MyBonsaiApi\Shared\Infrastructure\Symfony;

use MyBonsaiApi\Shared\Domain\Bus\Command\Command;
use MyBonsaiApi\Shared\Domain\Bus\Command\CommandBus;
use MyBonsaiApi\Shared\Domain\Bus\Query\Query;
use MyBonsaiApi\Shared\Domain\Bus\Query\QueryBus;
use MyBonsaiApi\Shared\Domain\Bus\Query\Response;
use function Lambdish\Phunctional\each;

abstract class ApiController
{
    private $queryBus;
    private $commandBus;
    private $exceptionHandler;

    public function __construct(
        QueryBus $queryBus,
        CommandBus $commandBus,
        ApiExceptionsHttpStatusCodeMapping $exceptionHandler
    ) {
        $this->queryBus         = $queryBus;
        $this->commandBus       = $commandBus;
        $this->exceptionHandler = $exceptionHandler;

        each($this->exceptionRegistrar(), $this->exceptions());
    }

    abstract protected function exceptions(): array;

    protected function ask(Query $query): ?Response
    {
        return $this->queryBus->ask($query);
    }

    protected function dispatch(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }

    private function exceptionRegistrar(): callable
    {
        return function ($httpCode, $exception): void {
            $this->exceptionHandler->register($exception, $httpCode);
        };
    }
}
