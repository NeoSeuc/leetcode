<?php

/**
 * Given an array of integers nums, calculate the pivot index of this array.
 *
 * The pivot index is the index where the sum of all the numbers strictly to the left of the index is equal to the sum of all the numbers strictly to the index's right.
 *
 * If the index is on the left edge of the array, then the left sum is 0 because there are no elements to the left. This also applies to the right edge of the array.
 *
 * Return the leftmost pivot index. If no such index exists, return -1.
 */
class Solution
{
    function pivotIndex($nums) {
        $totalSum = 0;
        foreach($nums as $num) {
            $totalSum += $num;
        };

        $leftSum = 0;
        for ($i = 0; $i < sizeof($nums); $i++) {
            if ($totalSum === $leftSum*2 + $nums[$i]) return $i;
            $leftSum += $nums[$i];
        }
        return -1;
    }
}


$solution = new Solution();
$testCases = [
    [[1, 7, 3, 6, 5, 6], 3],
    [[1, 2, 3], -1],
    [[2, 1, -1], 0],
];

$success = true;
foreach ($testCases as $testCase) {
    $result = $solution->pivotIndex($testCase[0]);
    if ($result !== $testCase[1]) {
        $success = false;
        echo 'Expected "' . json_encode($testCase[1]) . '" not equals to actually "' . json_encode($result) . "\"\n";
        echo 'TestCase input: ' . json_encode($testCase[0]) . "\n _____________ \n";
    }
}

if ($success) {
    echo "All test cases passed";
}