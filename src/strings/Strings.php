<?php

namespace strings;

Class Strings implements StringsInterface
{
    public function snakeCaseToCamelCase(string $input): string
    {
        $arr = explode('_', $input);
        $camelString = '';
        foreach($arr as $elem){
            $camelString .= ucfirst($elem);
        }
        return lcfirst($camelString);
    }

    public function mirrorMultibyteString(string $input): string
    {

        $finalString = '';

        $arrayWords = explode(' ', $input);

        foreach ($arrayWords as $key => $value) {
            $finalString .= $this->mb_strrev($value);

            if ($key !== array_key_last($arrayWords)) {
                $finalString .= ' ';
            }
        }
        return $finalString;
    }

    public function mb_strrev($str)
    {
        $reverseString = '';
        for ($i = mb_strlen($str); $i >= 0; $i--) {
            $reverseString .= mb_substr($str, $i, 1);
        }

       return $reverseString;
    }

    public function getBrandName(string $noun): string
    {
        $lenghtName = strlen($noun);
        $upFirstLetterName = ucfirst($noun);

        if($noun[0] != $noun[$lenghtName -1]){
            $newName = "The ".$upFirstLetterName;
        } else {
            $newName = substr_replace($upFirstLetterName, $noun, ($lenghtName - 1));
        }
        return $newName;
    }


}

interface StringsInterface
{
    public function snakeCaseToCamelCase(string $input): string;

    public function mirrorMultibyteString(string $input): string;

    public function getBrandName(string $noun): string;
}

?>
