<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Subitem extends Model
{
    public $incrementing = false;
    protected $fillable = ['price','name','image_id','is_topping'
    ];
    protected $table = 'subitems';
    protected $primaryKey = 'id';
}
