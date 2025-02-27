<?php
include_once 'LinkedList.php';

$node_1 = new Node(1);
$node_2 = new Node(2);
$node_3 = new Node(4);

$node_4 = new Node(1);
$node_5 = new Node(3);
$node_6 = new Node(4);

$node_7 = new Node(3);
$node_8 = new Node(2);
$node_9 = new Node(0);
$node_10 = new Node(-4);

//List 1
$node_1->next = $node_2;
$node_2->next = $node_3;
$node_3->next = null;
//List 2
$node_4->next = $node_5;
$node_5->next = $node_6;
$node_6->next = null;
//List 3
$node_7->next = $node_8;
$node_8->next = $node_9;
$node_9->next = $node_10;
$node_10->next = $node_8;

$listTest = new LinkedList();
//21. Merge Two Sorted Lists (LeetCode)
echo "Merged List";
$merged = $listTest->mergeTwoLists($node_1,$node_4);
echo "</br>";
echo  $merged;
echo "</br>";
//876. Middle of the Linked List
echo "Middle of List";
echo "</br>";
$middle = $listTest->middleNode($merged);
echo $middle;
echo "</br>";
//141. Linked List Cycle (Easy)
echo "IsCycle List";
echo "</br>";
echo $listTest->hasCycle($node_7) ? 'Yes': 'No';
echo "</br>";
//160. Intersection of Two Linked Lists
echo "Intersection of Two Linked Lists";
echo "</br>";
$node_11 = new Node(4);
$node_12 = new Node(1);
$node_13 = new Node(8);
$node_14 = new Node(4);
$node_15 = new Node(5);

$node_11->next = $node_12;
$node_12->next = $node_13;
$node_13->next = $node_14;
$node_14->next = $node_15;
$node_15->next = null;


$node_16 = new Node(5);
$node_17 = new Node(6);
$node_18 = new Node(2);
$node_19 = new Node(8);
$node_20 = new Node(4);
$node_21 = new Node(5);

$node_16->next = $node_17;
$node_17->next = $node_18;
$node_18->next = $node_19;
$node_19->next = $node_20;
$node_20->next = $node_21;
$node_21->next = null;

echo $listTest->getIntersection($node_11,$node_16);