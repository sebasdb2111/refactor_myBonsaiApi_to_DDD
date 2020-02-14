<?php

declare(strict_types = 1);

namespace MyBonsaiApi\Shared\Domain;

interface UuidGenerator
{
    public function generate(): string;
}
