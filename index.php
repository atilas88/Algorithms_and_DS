<?php
include_once 'LinkedList.php';

$node_1 = new Node(23);
$node_2 = new Node(55);
$node_3 = new Node(40);

$node_3->next = $node_1;
$node_1->next = $node_2;
$node_2->next = null;

$list = new LinkedList($node_3);

$list->print();
