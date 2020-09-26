<?php

declare(strict_types=1);

namespace Tests\Parakeet\Fixture;

use Parakeet\LogDriver;
use PHPUnit\Framework\Assert;

class TestDriver implements LogDriver
{
    private $logs = [];

    public function log(string $level, string $message, array $context = []): void
    {
        $this->logs[] = [
            'level' => $level,
            'message' => $message,
            'context' => $context
        ];
    }

    public function assertLogReceived(Log $log, string $message = ''): void
    {
        Assert::assertThat($this->logs, new ContainsLog($log), $message);
    }
}
