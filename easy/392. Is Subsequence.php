<?php

/**
 * Given two strings s and t, return true if s is a subsequence of t, or false otherwise.
 *
 * A subsequence of a string is a new string that is formed from the original string
 * by deleting some (can be none) of the characters without disturbing the relative positions of the remaining characters.
 * (i.e., "ace" is a subsequence of "abcde" while "aec" is not).
 */
class Solution
{
    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isSubsequence($s, $t)
    {
        $s1 = str_split($s);
        $t1 = str_split($t);

        if (strlen($s) === 0) return true;

        if (strlen($s) > strlen($t)) return false;


        foreach ($t1 as $index => $value) {
            if ($value === $s1[0]) {
                array_shift($s1);
            }
        }

        return !count($s1);
    }
}


$solution = new Solution();
$testCases = [
    ['', 'ahbgdc', true],
    ['abc', 'ahbgdc', true],
    ['axc', 'ahbgdc', false],
    ['ace', 'abcde', true],
    ['aec', 'abcde', false],
];

$success = true;
foreach ($testCases as $testCase) {
    $result = $solution->isSubsequence($testCase[0], $testCase[1]);
    if ($result !== $testCase[2]) {
        $success = false;
        echo 'Expected "' . $testCase[2] . '" not equals to actually "' . $result . "\"\n";
        echo 'TestCase input: ' . $testCase[0] . ', ' . $testCase[1] . "\n _____________ \n";
    }
}

if ($success) {
    echo "All test cases passed";
}