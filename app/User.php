<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Notifications\Notifiable as NotifiableTrait;

class User extends Model implements Authenticatable, CanResetPassword
{
    use AuthenticableTrait, CanResetPasswordTrait, NotifiableTrait;
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'gender', 'birth_date', 'phone', 'device_token', 'image_id', 'facebook_id'
    ];
    protected $hidden = [
        'password',
    ];
    protected $table = 'users';
    protected $primaryKey = 'id';
}
