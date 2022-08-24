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
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        if (empty($l1)) {
            return $l2;
        } elseif (empty($l2)) {
            return $l1;
        } elseif($l1->val < $l2->val) {
            $l1->next = $this->mergeTwoLists($l1->next, $l2);
            return $l1;
        } else {
            $l2->next = $this->mergeTwoLists($l1, $l2->next);
            return $l2;
        }
    }
}



$solution = new Solution();

$node3 = new ListNode(4);
$node2 = new ListNode(2, $node3);
$list1 = new ListNode(1, $node2);

$node3 = new ListNode(4);
$node2 = new ListNode(3, $node3);
$list2 = new ListNode(1, $node2);
$result = $solution->mergeTwoLists($list1, $list2);

while (true) {
    echo $result->val . ', ';
    if ($result->next != null)
        $result = $result->next;
    else break;
}