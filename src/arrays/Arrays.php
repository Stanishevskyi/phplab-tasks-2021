<?php

namespace arrays;

class Arrays implements ArraysInterface
{
    public function repeatArrayValues(array $input): array
    {
        $repeatArr = [];
        foreach($input as $key => $value){
            for($i = 1; $i <= $value; $i++){
                $repeatArr[] = $value;
            }
        }
        return $repeatArr;
    }

    public function getUniqueValue(array $input): int
    {
        $arrCountValues = array_count_values($input);
        $uniqueValueArr = [];
        foreach($arrCountValues as $key => $value){
            if($value == 1){
                $uniqueValueArr[] = $key;
            } 
        }

        if(count($uniqueValueArr) == 0){
            return 0;
        } else {
            return min($uniqueValueArr);
        }
    }

    public function groupByTag(array $input): array
    {
        $column = array_column($input, 'tags');
        $merged = call_user_func_array('array_merge', $column);
        $unique = array_unique($merged);
        sort($unique);

        $result = [];

        foreach ($unique as $tag) {
            $result[$tag] = [];
			
            foreach ($input as $value) {
                if (in_array($tag, $value['tags'])) {
                    $result[$tag][] = $value['name'];
                }
            }
        }
		
		$result = array_map(function($value) {
            sort($value);
            return $value;
        }, $result);
		
		return $result;
    }
}



interface ArraysInterface
{
    public function repeatArrayValues(array $input): array;

    public function getUniqueValue(array $input): int;

    public function groupByTag(array $input): array;
}


?>
