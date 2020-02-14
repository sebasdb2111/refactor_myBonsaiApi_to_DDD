<?php

declare(strict_types=1);

namespace MyBonsaiApi\Mb\Bonsais\Application\Create;

use MyBonsaiApi\Mb\Bonsais\Domain\BonsaiType;
use MyBonsaiApi\Mb\Bonsais\Domain\BonsaiName;
use MyBonsaiApi\Mb\Bonsais\Domain\BonsaiYears;
use MyBonsaiApi\Mb\Shared\Domain\Bonsai\BonsaiId;
use MyBonsaiApi\Shared\Domain\Bus\Command\CommandHandler;

final class CreateBonsaiCommandHandler implements CommandHandler
{
    private $creator;

    public function __construct(BonsaiCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(CreateBonsaiCommand $command)
    {
        $id    = new BonsaiId($command->id());
        $name  = new BonsaiName($command->name());
        $type  = new BonsaiType($command->type());
        $years = new BonsaiYears($command->years());

        $this->creator->__invoke($id, $name, $type, $years);
    }
}
