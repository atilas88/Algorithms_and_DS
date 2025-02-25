<?php
include_once 'LinkedList.php';

$node_1 = new Node(1);
$node_2 = new Node(2);
$node_3 = new Node(4);

$node_4 = new Node(1);
$node_5 = new Node(3);
$node_6 = new Node(4);


$node_1->next = $node_2;
$node_2->next = $node_3;
$node_3->next = null;

$node_4->next = $node_5;
$node_5->next = $node_6;
$node_6->next = null;

echo $node_1;
echo "</br>";
echo $node_4;

$listTest = new LinkedList();
//21. Merge Two Sorted Lists (LeetCode)
$merged = $listTest->mergeTwoLists($node_1,$node_4);
echo "</br>";
echo  $merged;


