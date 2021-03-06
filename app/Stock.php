<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    public function Produk()
    {
        return $this->belongsTo('App\Stock');
    }
}
