<?php

declare(strict_types=1);

namespace Parakeet;

class LogLevel
{
    private const LEVEL_EMERGENCY = 'emergency';
    private const LEVEL_ALERT = 'alert';
    private const LEVEL_CRITICAL = 'critical';
    private const LEVEL_ERROR = 'error';
    private const LEVEL_WARNING = 'warning';
    private const LEVEL_NOTICE = 'notice';
    private const LEVEL_INFO = 'info';
    private const LEVEL_DEBUG = 'debug';

    /**
     * @var string $level
     */
    private $level;

    private function __construct(string $level)
    {
        $this->level = $level;
    }

    public static function emergency(): self
    {
        return new self(self::LEVEL_EMERGENCY);
    }

    public static function alert(): self
    {
        return new self(self::LEVEL_ALERT);
    }

    public static function info(): self
    {
        return new self(self::LEVEL_INFO);
    }

    public static function critical(): self
    {
        return new self(self::LEVEL_CRITICAL);
    }

    public static function error(): self
    {
        return new self(self::LEVEL_ERROR);
    }

    public static function warning(): self
    {
        return new self(self::LEVEL_WARNING);
    }

    public static function notice(): self
    {
        return new self(self::LEVEL_NOTICE);
    }

    public static function debug(): self
    {
        return new self(self::LEVEL_DEBUG);
    }

    public function __toString(): string
    {
        return $this->level;
    }
}
