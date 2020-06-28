<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        foreach ($nums as $key => $value) {
            $ti = $target-$value; // calculate target index (it is a value but in flip array it is a key)
            if (isset($nums_flip[$ti])) {
                return [$key, $nums_flip[$ti]];
            }
            $nums_flip[$value] = $key;
        }
        throw new Exception("No two sum solution");
    }
}
