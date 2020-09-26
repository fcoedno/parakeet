<?php

declare(strict_types=1);

namespace Parakeet;

class Logger
{
    private $loggerDriver;

    public function __construct(LogDriver $loggerDriver)
    {
        $this->loggerDriver = $loggerDriver;
    }

    public function emergency(): LogBuilder
    {
        return (new LogBuilder($this->loggerDriver))
            ->level(LogLevel::emergency());
    }

    public function alert(): LogBuilder
    {
        return (new LogBuilder($this->loggerDriver))
            ->level(LogLevel::alert());
    }

    public function critical(): LogBuilder
    {
        return (new LogBuilder($this->loggerDriver))
            ->level(LogLevel::critical());
    }

    public function error(): LogBuilder
    {
        return (new LogBuilder($this->loggerDriver))
            ->level(LogLevel::error());
    }

    public function info(): LogBuilder
    {
        return (new LogBuilder($this->loggerDriver))
            ->level(LogLevel::info());
    }

    public function warning(): LogBuilder
    {
        return (new LogBuilder($this->loggerDriver))
            ->level(LogLevel::warning());
    }

    public function notice(): LogBuilder
    {
        return (new LogBuilder($this->loggerDriver))
            ->level(LogLevel::notice());
    }

    public function debug(): LogBuilder
    {
        return (new LogBuilder($this->loggerDriver))
            ->level(LogLevel::debug());
    }
}
