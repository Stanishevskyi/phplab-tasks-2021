<?php

use functions\Functions;
use PHPUnit\Framework\TestCase;

class SayHelloTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new Functions();
    }

    public function testCanSayHello()
    {
        $this->assertEquals('Hello', $this->functions->sayHello());
    }
}