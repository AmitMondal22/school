<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Student_model extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'student';
    protected $primaryKey = 'student_id';
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'father_name', 'mother_name', 'parent_Guardian_Name', 'gender', 'date_of_birtg', 'admission_date', 'aadhar_no', 'mobileno', 'email', 'password', 'adress', 'country_id', 'state_id', 'city_id', 'pin_no', 'created_by', 'update_by'];

    protected $hidden = [
        'password'
    ];
}
