<?php

declare(strict_types=1);

namespace MyBonsaiApi\Mb\Bonsais\Application\Remove;

use MyBonsaiApi\Mb\Shared\Domain\Bonsai\BonsaiId;
use MyBonsaiApi\Shared\Domain\Bus\Command\CommandHandler;

final class RemoveBonsaiCommandHandler implements CommandHandler
{
    private $remove;

    public function __construct(BonsaiRemover $remove)
    {
        $this->remove = $remove;
    }

    public function __invoke(RemoveBonsaiCommand $command)
    {
        $id = new BonsaiId($command->id());

        $this->remove->__invoke($id);
    }
}
