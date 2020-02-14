<?php

declare(strict_types = 1);

namespace MyBonsaiApi\Shared\Domain;

interface RandomNumberGenerator
{
    public function generate(): int;
}
