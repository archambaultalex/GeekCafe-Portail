<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ItemSubItem extends Model
{
    public $incrementing = false;
    protected $fillable = ['item_id','subitem_id'];
    protected $table = 'item_subitems';
    protected $primaryKey = 'id';

}
