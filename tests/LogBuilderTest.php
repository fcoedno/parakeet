<?php

declare(strict_types=1);

namespace Tests\Parakeet;

use Parakeet\LogBuilder;
use PHPUnit\Framework\TestCase;
use Tests\Parakeet\Fixture\Log;
use Tests\Parakeet\Fixture\TestDriver;

class LogBuilderTest extends TestCase
{
    public function testShouldAddMessages(): void
    {
        $driver = new TestDriver();
        $builder = new LogBuilder($driver);

        $builder
            ->message('structured logging is awesome')
            ->log();

        $driver->assertLogReceived(
            Log::aLog()->withMessage('structured logging is awesome')
        );
    }

    /**
     * @dataProvider provideContextualFields()
     */
    public function testShouldAddContextualFields(string $method, string $key, $value): void
    {
        $driver = new TestDriver();
        $builder = new LogBuilder($driver);

        $builder
            ->{$method}($key, $value)
            ->log();

        $driver->assertLogReceived(
            Log::aLog()->withContext([$key => $value])
        );
    }

    public function provideContextualFields(): array
    {
        return [
            'string fields' => ['string', 'foo', 'bar'],
            'int fields' => ['int', 'answer', 42],
            'float fields' => ['float', 'answer', 42.0],
            'boolean fields' => ['bool', 'true', false],
        ];
    }
}
