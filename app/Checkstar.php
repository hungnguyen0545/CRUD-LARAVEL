<?php 

namespace App;

class Checkstar
{
    public $items = null;

    public function __construct($oldValue)
    {
        if($oldValue)
        {
            $this->items = $oldValue->items;
        }
    }
    public function add($id, $item)
    {
        $storedItem = ['item' => $item ];
       if($this->items)
       {
           if(isset($this->items[$id]))
           {
               $storedItem = $this->items[$id];
           }
       }
       $this->items[$id] = $storedItem;
    }

}   
?>

