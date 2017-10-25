<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'id';

    protected $fillable = [
        'is_active'
    ];


    public function saleitems()
    {
        return $this->hasMany('App\SaleItem','sales_id');
    }

}
