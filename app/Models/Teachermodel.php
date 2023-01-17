<?php

namespace App\Models;



use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Teachermodel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'teacher';
    protected $primaryKey = 'teacher_id';
    protected $fillable = ["name", "mobile_no", "password", "dateofbirth", "country_id", "state_id", "city_id", "school_id","class_id", "role","active", "created_by", "update_by"];

    protected $hidden = [
        'password'
    ];
}
