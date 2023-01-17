<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class Wc_user extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'wc_user';
    protected $primaryKey = 'wc_user_id';

    protected $fillable = ['name', 'email', 'password', 'd_o_b', 'mobile_no', 'gender', 'adress', 'dp','dp_path', 'user_role', 'status', 'created_by', 'update_by' ];

    protected $hidden = [
        'password',
    ];
}
