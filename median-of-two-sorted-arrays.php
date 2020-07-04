<?php
/*
There are two sorted arrays nums1 and nums2 of size m and n respectively.
Find the median of the two sorted arrays. The overall run time complexity should be O(log (m+n)).
You may assume nums1 and nums2 cannot be both empty.

Example 1:
nums1 = [1, 3]
nums2 = [2]

The median is 2.0

Example 2:
nums1 = [1, 2]
nums2 = [3, 4]

The median is (2 + 3)/2 = 2.5
*/


/**
 * Varian 1
 */
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $nums = array_merge($nums1, $nums2);
        sort($nums);
        $count = count($nums);
        $mediana = $count / 2;
        if (($count) % 2 === 1) {
            return $nums[floor($mediana)];
        } else {
            return ($nums[$mediana-1] + $nums[$mediana]) / 2 ?: 0;
        }
    }
}

/**
 * Variant 2
 */
class Solution2 {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $is_set_num_1 = isset($nums1[0]);
        $is_set_num_2 = isset($nums2[0]);
        if ($is_set_num_1 and $is_set_num_2) {
            $i = 0;
            $j = 0;
            while ($is_set_num_1 or $is_set_num_2) {
                if (!$is_set_num_2 or ($is_set_num_1 and $nums1[$i] <= $nums2[$j])) {
                    $nums[] = $nums1[$i];
                    $i++;
                    $is_set_num_1 = isset($nums1[$i]);
                } else {
                    $nums[] = $nums2[$j];
                    $j++;
                    $is_set_num_2 = isset($nums2[$j]);
                }
            }

            $count = $i + $j;
        } else {
            $nums = $nums1[0] !== null ? $nums1 : $nums2;
            $count = count($nums);
        }

        if ($count % 2 === 1) {
            return $nums[floor($count / 2)];
        } else {
            return ($nums[($count/2)-1] + $nums[$count/2]) / 2 ?: 0;
        }
    }
}
