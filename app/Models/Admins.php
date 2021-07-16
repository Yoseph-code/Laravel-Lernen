<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class Admins extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    protected $fillable =
    [
        'email', 'password',
    ];
    protected $hidden = 
    [
        'password',
        'remenber_token',
    ];
    protected $table = 'admins';
}
