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
     * @param Node|null $list
     * @return void
     */
   public function print(Node $list = null): void
   {
       $node = $list ?? $this->head;
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

    /**
     * @param int $data
     * @param int $pos
     * @return void
     */
   public function insertNode(int $data, int $pos): void
   {
        $toAdd = new Node($data);
        if($pos === 0)
        {
            $toAdd->next = $this->head;
            $this->head = $toAdd;
            return;
        }

        $prev = $this->head;
        for ($i = 0; $i < $pos - 1; $i++)
        {
            $prev = $prev->next;
        }
        $toAdd->next = $prev->next;
        $prev->next = $toAdd;
   }

    /**
     * @param int $pos
     * @return void
     */
   public function deleteNode(int $pos):void
   {
       if($pos === 0)
       {
           $this->head = $this->head->next;
           return;
       }
       $prev = $this->head;
       for ($i = 0; $i < $pos - 1; $i++)
       {
           $prev = $prev->next;
       }
       $prev->next = $prev->next->next;
   }

    /**
     * @return Node
     */
   public function reverseList():Node
   {
       $prev = null;
       $current = $this->head;
       
       while ($current!=null)
       {
           $forward = $current->next;
           $current->next = $prev;
           $prev = $current;
           $current = $forward;
       }
       return $prev;

   }

    /**
     * @return Node
     */
   public function middleNode():Node
   {
       if($this->head->next == null)
       {
           return $this->head;
       }
       //Define fast and slow pointer
       $fast = $this->head;
       $slow = $this->head;
       while ($fast!= null && $fast->next !=null)
       {
           $slow = $slow->next;
           $fast = $fast->next->next;
       }
       return $slow;
   }

}
