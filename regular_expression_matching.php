<?php
/*
Given an input string (s) and a pattern (p), implement regular expression matching with support for '.' and '*'.
'.' Matches any single character.
'*' Matches zero or more of the preceding element.
The matching should cover the entire input string (not partial).

Note:
   - s could be empty and contains only lowercase letters a-z.
   - p could be empty and contains only lowercase letters a-z, and characters like . or *.
*/

class Solution {

    /**
     * @param String $s
     * @param String $p
     * @return Boolean
     */
    function isMatch($s, $p) {
        return preg_match("/{$p}/s", $s, $matches) === 1 and $matches[0] === $s;
    }
}
