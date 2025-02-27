<?php

class Node
{
    /**
     * @param int $val
     * @param Node|null $next
     */
    public function __construct(public int $val = 0, public ?Node $next = null)
    {
    }

    public function __toString(): string
    {
        $result = (string)$this->val;

        if($this->next){
            $current = $this->next;

            while($current->next)
            {
                $result.= '->'.$current->val;
                $current = $current->next;
            }
            $result.= '->'.$current->val;
        }
        return $result;
    }
}
class LinkedList
{


    /**
     * @param Node|null $list
     * @return Node
     */
   public function reverseList(Node $list = null):Node
   {
       $prev = null;
       $current = $list;
       
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
       if($list->next === null)
       {
           return $list;
       }
       //Define fast and slow pointer
       $fast = $list;
       $slow = $list;
       while ($fast!== null && $fast->next !== null)
       {
           $slow = $slow->next;
           $fast = $fast->next->next;
       }
       return $slow;
   }

    /**
     * @param Node|null $list
     * @return bool
     */
   public function hasCycle(Node $list = null):bool
   {
       $fast = $list;
       $slow = $list;

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
     * @param Node|null $list
     * @return bool
     */
   public function isPalindrome(Node $list = null):bool
   {
       $middle = $this->middleNode($list);
       $slow = $this->reverseList($middle);

       while ($slow !== null && ($list->val === $slow->val))
       {
           $slow = $slow->next;
           $list = $list->next;
       }
       return $slow === null;
   }

    /**
     * @param Node $headA
     * @param Node $headB
     * @return Node|null
     */
   public function getIntersection(Node $headA, Node $headB): Node | null
   {
       $one = $headA;
       $two = $headB;

       while ($one !== $two)
       {
           $one = $one === null ? $headB : $one->next;
           $two = $two === null ? $headA : $two->next;
       }
       return $one;
   }

    /**
     * @param Node $list1
     * @param Node $list2
     * @return Node
     */
   public function mergeTwoLists(Node $list1, Node $list2):Node
   {
       $dummy = new Node();

       $current = $dummy;

       while($list1 && $list2)
       {
           if($list1->val < $list2->val)
           {
               $current->next = $list1;
               $list1 = $list1->next;

           }
           else
           {
               $current->next = $list2;
               $list2 = $list2->next;

           }
           $current = $current->next;
       }

       if($list1)
       {
           $current->next = $list1;
       }
       if($list2)
       {
           $current->next = $list2;
       }

       return $dummy->next;
   }


}
