<?php

declare(strict_types=1);

namespace Tests\Parakeet\Fixture;

class Log
{
    private $level;
    private $message;
    private $context;

    public static function aLog(): self
    {
        return new self();
    }

    public function withLevel(string $level): self
    {
        $this->level = $level;
        return $this;
    }

    public function withMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function withContext(array $context): self
    {
        $this->context = $context;
        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function getContext(): ?array
    {
        return $this->context;
    }

    public function isEmpty(): bool
    {
        return $this->level === null
            && $this->message === null
            && $this->context === null;
    }
}
