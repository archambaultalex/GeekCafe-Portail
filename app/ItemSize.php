<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ItemSize extends Model
{
    public $incrementing = false;
    protected $fillable = [
    ];
    protected $table = 'item_sizes';
    protected $primaryKey = 'id';
}
