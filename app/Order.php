<?php

namespace Flommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function users()
    {
        return $this->belongsTo('Flommerce\User');
    }
}
