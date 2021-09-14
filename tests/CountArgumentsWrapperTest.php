<?php


use functions\Functions;
use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new Functions();
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testCountArgumentsWrapper($arg)
    {
        $this->expectException(InvalidArgumentException::class);

        $this->functions->CountArgumentsWrapper($arg);
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
