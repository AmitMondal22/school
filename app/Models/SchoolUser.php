<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class SchoolUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // protected $guard = 'orgSadmin';
    protected $table = 'school_user';
    protected $primaryKey = 'school_user_id';
    protected $fillable = [
        "name", "email", "password", "mobile_no", "role","otp", "active_status","pay_id","deactive_date","admin_active", "payment_status", "payment_active_status", "payment_date","email_verified_at","remember_token", "create_by"
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
