<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ItemSubItem extends Model
{
    public $incrementing = false;
    protected $fillable = [
    ];
    protected $table = 'item_subitems';
    protected $primaryKey = 'id';
}
