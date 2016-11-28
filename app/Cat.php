<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    public function cats()
    {
        return $this->hasMany(Cat::class);
    }
}
