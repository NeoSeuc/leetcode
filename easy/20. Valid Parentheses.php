<?php

/**
 * Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.
 *
 * An input string is valid if:
 *
 * Open brackets must be closed by the same type of brackets.
 * Open brackets must be closed in the correct order.
 */
class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s)
    {
        if (in_array($s[0], [')', ']', '}'])) {
            return false;
        }
        $opened = [];
        for ($i = 0; $i < mb_strlen($s); $i++) {
            switch ($s[$i]) {
                case '(':
                    $opened[] = '(';
                    break;
                case ')':
                    if (end($opened) === '(') {
                        array_pop($opened);
                    } else {
                        return false;
                    }
                    break;
                case '[':
                    $opened[] = '[';
                    break;
                case ']':
                    if (end($opened) === '[') {
                        array_pop($opened);
                    } else {
                        return false;
                    }
                    break;
                case '{':
                    $opened[] = '{';
                    break;
                case '}':
                    if (end($opened) === '{') {
                        array_pop($opened);
                    } else {
                        return false;
                    }
                    break;
            }
        }

        return count($opened) === 0;
    }
}


$solution = new Solution();
$testCases = [
    ['[', false],
    ["{[]}", true],
    ["()", true],
    ["()[]{}", true],
    ["(]", false],
    ["([)]", false]
];

$success = true;
foreach ($testCases as $testCase) {
    $result = $solution->isValid($testCase[0]);
    if ($result !== $testCase[1]) {
        $success = false;
        echo 'Expected "' . $testCase[1] . '" not equals to actually "' . $result . "\"\n";
        echo 'TestCase input: ' . $testCase[0] . "\n _____________ \n";
    }
}

if ($success) {
    echo "All test cases passed";
}