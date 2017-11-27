<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleSubitem extends Model
{
    protected $table = 'sale_subitems';
    protected $primaryKey = 'id';
    protected $fillable = ['item_id','subitem_id'];

    public function saleitems()
    {
        return $this->belongsTo('App\SaleItem');
    }
}
