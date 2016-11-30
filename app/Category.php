<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /*
     * Set all protected fields which allow editing.
     */
    protected $fillable = [
        'title',
        'description',
        'slug'
    ];

    /**
     *
     * A product belongs to a Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
