<?php
/*
Given an array nums of n integers, are there elements a, b, c in nums such that a + b + c = 0? Find all unique triplets in the array which gives the sum of zero.

Note:
The solution set must not contain duplicate triplets.

Example:
Given array nums = [-1, 0, 1, 2, -1, -4],

A solution set is:
[
  [-1, 0, 1],
  [-1, -1, 2]
]
*/

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {
        sort($nums);
        $count = count($nums);
        $answers = [];
        $dups = [];
        foreach($nums as $i => $target){
            if($target > 0) break;
            if(isset($nums[$i-1]) && $target == $nums[$i-1]) continue;
            $lo_i = $i+1;
            $hi_i = $count-1;
            while($lo_i < $hi_i){
                $num = $nums[$lo_i] + $nums[$hi_i];
                if($num < -$target){
                    $lo_i++;
                } elseif($num > -$target){
                    $hi_i--;
                } else {
                    $k = "{$target}:{$nums[$lo_i]},{$nums[$hi_i]}";
                    if(!isset($dups[$k])){
                        $dups[$k] = true;
                        $answers[] = [$target, $nums[$lo_i], $nums[$hi_i]];
                    }
                    $hi_i--;
                    $lo_i++;
                }
            }
        }

        return $answers;
    }
}
