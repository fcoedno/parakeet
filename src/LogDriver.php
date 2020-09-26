<?php

declare(strict_types=1);

namespace Parakeet;

interface LogDriver
{
    public function log(string $level, string $message, array $context = []): void;
}
