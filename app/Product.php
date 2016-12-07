<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'img_path',
        'price',
        'sale',
        'slug',
    ];

    /**
     *
     * A Category can have many products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->belongsTo('App\Category');
    }

    public function getBuyableIdentifier($options = null){
        return $this->id;
    }

    public function getBuyableDescription(){
        return $this->name;
    }

    public function getBuyablePrice(){
        return $this->price;
    }
}
