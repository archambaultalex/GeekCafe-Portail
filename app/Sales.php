<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'id';


    public function saleitems()
    {
        return $this->hasMany('App\SaleItem');
    }

}
