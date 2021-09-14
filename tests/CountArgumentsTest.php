<?php

use functions\Functions;
use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    /**
     * @var Functions
     */
    protected $functions;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $this->functions = new Functions();
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testCountArguments($argumentsDataProvider)
    {
        $argumentsFunction = call_user_func_array([$this->functions,'countArguments'], $argumentsDataProvider);

        $this->assertEquals(count($argumentsDataProvider), $argumentsFunction['argument_count']);
        $this->assertEquals($argumentsDataProvider, $argumentsFunction['argument_values']);
    }

    /**
     * @return array
     */
    public function positiveDataProvider()
    {
        return [
            [[]],
            [['Hello']],
            [['Hello', 'world']],
        ];
    }
}
