<?php

use functions\Functions;
use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new Functions();
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testSayHelloArgumentWrapper($input)
    {
        $this->expectException(InvalidArgumentException::class);

        $this->functions->sayHelloArgumentWrapper($input);
    }

    public function positiveDataProvider()
    {
        return [
            [[]],
            [function() {}],
            [null],
            [$this->functions]
        ];
    }
}
