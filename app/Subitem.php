<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Subitem extends Model
{
    public $incrementing = false;
    protected $fillable = [
    ];
    protected $table = 'subitems';
    protected $primaryKey = 'id';
}
