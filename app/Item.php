<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $incrementing = false;
    protected $fillable = [
        'name',
        'description',
        'type_id',
        'image_id',
        'quantity'
    ];
    protected $table = 'items';
    protected $primaryKey = 'id';

}
