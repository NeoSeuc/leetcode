<?php

/**
 * Given two strings s and t, determine if they are isomorphic.
 *
 * Two strings s and t are isomorphic if the characters in s can be replaced to get t.
 *
 * All occurrences of a character must be replaced with another character while preserving the order of characters
 * No two characters may map to the same character, but a character may map to itself.
 */
class Solution
{
    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isIsomorphic($s, $t)
    {
        $mapping = [];
        for ($i=0; $i < strlen($s); $i++) {
            if (isset($mapping[$s[$i]])) {
                //if mapping[s[i]] != t[i] then t[i] differs so false
                if ($mapping[$s[$i]] !== $t[$i]) return false;
            } else {
                //If t[i] is already in mapping, but is not associated with s[i] then false
                if (in_array($t[$i], $mapping)) return false;
                $mapping[$s[$i]] = $t[$i];
            }
        }

        return true;
    }
}

$solution = new Solution();
$testCases = [
    ['egg', 'add', true],
    ['foo', 'bar', false],
    ['paper', 'title', true],
    ['a', 'b', true],
    ['badc', 'baba', false],
];

$success = true;
foreach ($testCases as $testCase) {
    $result = $solution->isIsomorphic($testCase[0], $testCase[1]);
    if ($result !== $testCase[2]) {
        $success = false;
        echo 'Expected "' . $testCase[1] . '" not equals to actually "' . $result . "\"\n";
        echo 'TestCase input: ' . $testCase[0] . ',' . $testCase[1] . "\n _____________ \n";
    }
}

if ($success) {
    echo "All test cases passed";
}

// a > a  b,c > d