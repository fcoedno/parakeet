<?php

declare(strict_types=1);

namespace Tests\Parakeet\Fixture;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\Constraint;

class ContainsLog extends Constraint
{
    private $expectedLog;

    public function __construct(Log $expectedLog)
    {
        $this->expectedLog = $expectedLog;
    }

    public function toString(): string
    {
        return 'contains the log ' . $this->exporter()->export($this->expectedLog);
    }

    protected function matches($other): bool
    {
        if (!is_array($other)) {
            return false;
        }

        if ($this->expectedLog->isEmpty()) {
            return false;
        }

        foreach ($other as $log) {
            if ($this->matchesLog($log)) {
                return true;
            }
        }

        return false;
    }

    private function matchesLog($otherLog): bool
    {
        if (!is_array($otherLog)) {
            return false;
        }

        if ($this->expectedLog->getMessage() !== null) {
            $otherMessage = $otherLog['message'] ?? null;
            if ($otherMessage !== $this->expectedLog->getMessage()) {
                return false;
            }
        }

        if ($this->expectedLog->getLevel() !== null) {
            $otherLevel = $otherLog['level'] ?? null;
            if ($otherLevel !== $this->expectedLog->getLevel()) {
                return false;
            }
        }

        if ($this->expectedLog->getContext() !== null) {
            $otherContext = $otherLog['context'] ?? null;
            if ($otherContext !== $this->expectedLog->getContext()) {
                return false;
            }
        }

        return true;
    }
}
