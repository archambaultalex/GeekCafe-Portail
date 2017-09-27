<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable=['id','image'];

    public function user(){
        return $this->hasOne('App\Users');
    }
}
