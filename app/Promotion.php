<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'description',
        'item_id',
        'available_per_user',
        'reduction',
        'start_date',
        'end_date'
    ];
}
