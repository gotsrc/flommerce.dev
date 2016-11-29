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
    
}
