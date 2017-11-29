<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public $incrementing = false;
    protected $fillable = [
        'location',
        'coordinates',
        'num_tax1',
        'num_tax2',
        'email',
        'phone',
        'manager_name',
        'manager_email',
        'manager_phone',
        'image_id',

    ];
    protected $table = 'branches';
    protected $primaryKey = 'id';
}
