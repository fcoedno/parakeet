<?php

declare(strict_types=1);

namespace Tests\Parakeet;

use Parakeet\Hello;
use PHPUnit\Framework\TestCase;

class HelloTest extends TestCase
{
    public function testShouldGreet()
    {
        $hello = new Hello();
        $this->assertEquals("Hello World!", $hello->greet());
    }
}