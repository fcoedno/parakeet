<?php

declare(strict_types=1);

namespace Parakeet;

use phpDocumentor\Reflection\Types\Mixed_;
use Psr\Log\LoggerInterface;

class LogBuilder
{
    /**
     * @var LogLevel $level
     */
    private $level = 'info';

    /**
     * @var string $message
     */
    private $message = '';

    /**
     * @var array $context
     */
    private $context = [];

    /**
     * @var LoggerInterface $loggerDriver
     */
    private $loggerDriver;

    public function __construct(LogDriver $loggerDriver)
    {
        $this->loggerDriver = $loggerDriver;
    }

    public function level(LogLevel $level): self
    {
        $builder = clone $this;
        $builder->level = $level;
        return $builder;
    }

    public function message(string $message)
    {
        $builder = clone $this;
        $builder->message = $message;
        return $builder;
    }

    public function string(string $key, string $value): self
    {
        $builder = clone $this;
        $builder->context = $builder->addToContext($key, $value);
        return $builder;
    }

    public function int(string $key, int $value): self
    {
        $builder = clone $this;
        $builder->context = $builder->addToContext($key, $value);
        return $builder;
    }

    public function float(string $key, float $value): self
    {
        $builder = clone $this;
        $builder->context = $builder->addToContext($key, $value);
        return $builder;
    }

    public function bool(string $key, bool $value): self
    {
        $builder = clone $this;
        $builder->context = $builder->addToContext($key, $value);
        return $builder;
    }

    private function addToContext($key, $value): array
    {
        $context = $this->context;
        $context[$key] = $value;
        return $context;
    }

    public function log(): void
    {
        $this->loggerDriver->log((string) $this->level, $this->message, $this->context);
    }
}
