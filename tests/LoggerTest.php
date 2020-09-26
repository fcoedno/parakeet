<?php

declare(strict_types=1);

namespace Tests\Parakeet;

use Parakeet\LogDriver;
use Parakeet\Logger;
use PHPUnit\Framework\TestCase;
use Tests\Parakeet\Fixture\TestDriver;
use Tests\Parakeet\Fixture\Log;

class LoggerTest extends TestCase
{
    /**
     * @var LogDriver $fakeDriver
     */
    private $fakeDriver;

    /**
     * @var Logger $logger
     */
    private $logger;

    protected function setUp(): void
    {
        $this->fakeDriver = new TestDriver();
        $this->logger = new Logger($this->fakeDriver);
    }

    public function testShouldLogEmergencyLevel(): void
    {
        $this->logger->emergency()->log();

        $this->fakeDriver->assertLogReceived(
            Log::aLog()->withLevel('emergency')
        );
    }

    public function testShouldLogAlertLevel(): void
    {
        $this->logger->alert()->log();

        $this->fakeDriver->assertLogReceived(
            Log::aLog()->withLevel('alert')
        );
    }

    public function testShouldLogCriticalLevel(): void
    {
        $this->logger->critical()->log();

        $this->fakeDriver->assertLogReceived(
            Log::aLog()->withLevel('critical')
        );
    }

    public function testShouldLogErrorLevel(): void
    {
        $this->logger->error()->log();

        $this->fakeDriver->assertLogReceived(
            Log::aLog()->withLevel('error')
        );
    }

    public function testShouldLogWarningLevel(): void
    {
        $this->logger->warning()->log();

        $this->fakeDriver->assertLogReceived(
            Log::aLog()->withLevel('warning')
        );
    }

    public function testShouldLogNoticeLevel(): void
    {
        $this->logger->notice()->log();

        $this->fakeDriver->assertLogReceived(
            Log::aLog()->withLevel('notice')
        );
    }

    public function testShouldLogInfoLevel(): void
    {
        $this->logger->info()->log();

        $this->fakeDriver->assertLogReceived(
            Log::aLog()->withLevel('info')
        );
    }

    public function testShouldLogDebugLevel(): void
    {
        $this->logger->debug()->log();

        $this->fakeDriver->assertLogReceived(
            Log::aLog()->withLevel('debug')
        );
    }
}
