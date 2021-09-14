<?php

use functions\Functions;
use PHPUnit\Framework\TestCase;

class SayHelloArgumentTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new Functions();
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testSayHelloArgument($input, $expected)
    {
        $this->assertEquals($expected, $this->functions->sayHelloArgument($input));
    }

    public function positiveDataProvider()
    {
        return [
            [1, 'Hello 1'],
            ['world', 'Hello world'],
            [true, 'Hello 1'],
        ];
    }
}