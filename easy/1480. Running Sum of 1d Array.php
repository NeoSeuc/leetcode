<?php

/**
 * Given an array nums. We define a running sum of an array as runningSum[i] = sum(nums[0]…nums[i]).
 *
 * Return the running sum of nums.
 */
class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function runningSum($nums)
    {
        $result = [];
        foreach ($nums as $key => $num) {
            $result[] = end($result) + $num;
        }

        return $result;
    }
}


$solution = new Solution();
$testCases = [
    [[1, 2, 3, 4], [1, 3, 6, 10]],
    [[1, 1, 1, 1, 1], [1, 2, 3, 4, 5]],
    [[3, 1, 2, 10, 1], [3, 4, 6, 16, 17]],
];

$success = true;
foreach ($testCases as $testCase) {
    $result = $solution->runningSum($testCase[0]);
    if (array_diff($result, $testCase[1])) {
        $success = false;
        echo 'Expected "' . json_encode($testCase[1]) . '" not equals to actually "' . json_encode($result) . "\"\n";
        echo 'TestCase input: ' . json_encode($testCase[0]) . "\n _____________ \n";
    }
}

if ($success) {
    echo "All test cases passed";
}