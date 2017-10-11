<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleSubitem extends Model
{
    protected $table = 'sale_subitems';
    protected $primaryKey = 'id';

    public function saleitems()
    {
        return $this->belongsTo('App\SaleItem');
    }
}
