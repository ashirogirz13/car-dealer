<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    public function produk()
    {
        return $this->belongsTo('App\Produk');
    }
}
