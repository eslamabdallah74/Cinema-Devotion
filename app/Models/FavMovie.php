<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FavMovie
{
    use HasFactory;

    public $items     = null;
    public $totalQty  = 1;

    public function __construct($oldFav)
    {
        if($oldFav)
        {
            $this->items    = $oldFav->items;
            $this->totalQty = $oldFav->totalQty;
        }
    }

    public function add($item, $id)
    {
        $storedItem = ['Movie' => $item];
        if ($this->items)
        {
            if(array_key_exists($id, $this->items))
            {
                $storedItem = $this->items[$id];
            } else {
                $this->totalQty++;
            }
        }
        $this->items[$id] = $storedItem;
    }


}
