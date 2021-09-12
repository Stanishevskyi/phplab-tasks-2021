<?php

namespace basics;

Class BasicsValidator implements BasicsValidatorInterface
{
    public function isMinutesException(int $minute): void
    {
        if($minute < 0 || $minute >= 60){
            throw new \InvalidArgumentException('The number must be from 0 to 59');
        }
    }

    public function isYearException(int $year): void
    {
        if($year < 1900){
            throw new \InvalidArgumentException('Year must be higher than 1900');
        }
    }

    public function isValidStringException(string $input): void
    {
        if(strlen($input) != 6){
            throw new \InvalidArgumentException('Input must contain 6 digits!');
        }
    }
}

interface BasicsValidatorInterface
{
    public function isMinutesException(int $minute): void;

    public function isYearException(int $year): void;

    public function isValidStringException(string $input): void;
}

?>
