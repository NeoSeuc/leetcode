<?php

/**
 * Given an array nums. We define a running sum of an array as runningSum[i] = sum(nums[0]…nums[i]).
 *
 * Return the running sum of nums.
 */

class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution
{
    function reverseList($head)
    {
        $prev = null;

        while ($head != null) {
            $next = $head->next;
            $head->next = $prev;
            $prev = $head;
            $head = $next;

        }

        return $prev;
    }
}


$solution = new Solution();

$head = new ListNode(
    1,
    new ListNode(
        2,
        new ListNode(
            3,
            new ListNode(
                4,
                new ListNode(
                    5
                )
            )
        )
    )
);

$result = $solution->reverseList($head);

while (true) {
    echo $result->val . ', ';
    if ($result->next != null)
        $result = $result->next;
    else break;
}