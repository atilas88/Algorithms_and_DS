<?php

class Node
{
    /**
     * @param int $data
     * @param Node|null $next
     */
    public function __construct(public int $data = 0, public ?Node $next = null)
    {
    }
}
class LinkedList
{
    /**
     * @param Node|null $head
     */
   public function __construct(public ?Node $head = null)
   {
   }

    /**
     * @return void
     */
   public function print(): void
   {
       $node = $this->head;
       while($node)
       {
           echo $node->data;
           if($node = $node->next)
           {
               echo ' -> ';
           }
       }
       echo "\n";
   }

}
