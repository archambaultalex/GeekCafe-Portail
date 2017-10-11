<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $table = 'sale_items';
    protected $primaryKey = 'id';


    public function sales()
    {
        return $this->belongsTo('App\Sales');
    }

    public function salesubitem()
    {
        return $this->hasMany('App\SaleSubitem');
    }

}
