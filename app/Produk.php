<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    //
    public function stock()
    {
        return $this->hasMany('App\Stock');
    }
    public function stock_sum_pemasukan()
    {
        return $this->hasMany('App\Stock')->where('status', 'masuk');
    }
    public function stock_sum_pengeluaran()
    {
        return $this->hasMany('App\Stock')->where('status', 'keluar');
    }
}
