<?php

/**
 * Given the head of a singly linked list, return the middle node of the linked list.
 *
 * If there are two middle nodes, return the second middle node.
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
     * @param ListNode $head
     * @return ListNode
     */
    function middleNode($head)
    {
        $count = $this->countNodes($head);
        $middleIndex = ceil($count/2);
        $currentIndex = 0;
        $currentNode = $head;

        while (true) {
            if ($currentNode->next !== null) {
                $currentNode = $currentNode->next;
                $currentIndex++;
            }

            if ($currentIndex == $middleIndex) {
                return $currentNode;
            }
        }
    }

    /**
     * @param ListNode $head
     * @return int
     */
    public function countNodes(ListNode $head)
    {
        $count = 0;
        $current = $head;
        while (true) {
            if ($current->next != null) {
                $current = $current->next;
                $count++;
            } else {
                return $count;
            }
        }
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

$result = $solution->middleNode($head);

while (true) {
    echo $result->val . ', ';
    if ($result->next != null)
        $result = $result->next;
    else break;
}