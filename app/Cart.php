<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function get($rowId)
    {
        $content = $this->getContent();
        dd($rowId.$content);

        if ( ! $content->has($rowId) )
            throw new InvalidRowIDException("The cart does not contain rowId {$rowId}.");
            return $content->get($rowId);
        }

    }
    public function addToCart($id)
    {
            
    }
}
