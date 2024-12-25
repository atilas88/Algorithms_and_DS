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
     * @param Node|null $list
     * @return Node
     */
   public function reverseList(Node $list = null):Node
   {
       $prev = null;
       $current = $list ?? $this->head;
       
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
     * @param Node|null $list
     * @return Node
     */
   public function middleNode(Node $list = null):Node
   {
       if($this->head->next === null)
       {
           return $this->head;
       }
       //Define fast and slow pointer
       $fast = $list ?? $this->head;
       $slow = $list ??  $this->head;
       while ($fast!== null && $fast->next !== null)
       {
           $slow = $slow->next;
           $fast = $fast->next->next;
       }
       return $slow;
   }

    /**
     * @return bool
     */
   public function hasCycle():bool
   {
       $fast = $this->head;
       $slow = $this->head;

       while($fast !== null && $fast->next !== null)
       {
           $slow = $slow->next;
           $fast = $fast->next->next;

           if($fast === $slow)
           {
               return true;
           }
       }
       return false;
   }

    /**
     * @return bool
     */
   public function isPalindrome():bool
   {
       $middle = $this->middleNode();
       $slow = $this->reverseList($middle);

       while ($slow !== null && ($this->head->data === $slow->data))
       {
           $slow = $slow->next;
           $this->head = $this->head->next;
       }
       return $slow === null;
   }

    /**
     * @param Node $listOne
     * @param Node $listTwo
     * @return Node
     */
   public function getIntersection(Node $listOne, Node $listTwo): Node
   {
       $one = $listOne;
       $two = $listTwo;
       while ($one !== $two)
       {
           $one = $one === null ? $listTwo : $one->next;
           $two = $two === null ? $listOne : $two->next;
       }
       return $two;
   }


}
