<?php

namespace basics;

Class Basics implements BasicsInterface
{
    public $validator;

    public function __construct()
    {
        $this->validator = new BasicsValidator;
    }

    public function getMinuteQuarter(int $minute): string
    {
        $this->validator->isMinutesException($minute);
        if($minute > 0 && $minute <=15){
            return "first";
        } elseif($minute >= 16 && $minute <=30){
            return "second";
        } elseif ($minute >= 31 && $minute <=45) {
            return "third";
        } elseif ($minute >= 46 && $minute <=59 || $minute == 0) {
            return "fourth";
        }
    }

    public function isLeapYear(int $year): bool
    {
        $this->validator->isYearException($year);
        
        if ($year % 400 == 0 || ($year % 4 == 0 && $year % 100 != 0)) {
            return true;
        } else {
            return false;
        }

    }

    public function isSumEqual(string $input): bool
    {
        $this->validator->isValidStringException($input);
        $inputArr = str_split($input, 1);
        if(($inputArr[0] + $inputArr[1] + $inputArr[2]) == ($inputArr[3] + $inputArr[4] + $inputArr[5])){
            return true;
        } else {
            return false;
        }
    }

} 

interface BasicsInterface
{
    public function getMinuteQuarter(int $minute): string;

    public function isLeapYear(int $year): bool;

    public function isSumEqual(string $input): bool;
}

?>
