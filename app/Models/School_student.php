<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School_student extends Model
{
    use HasFactory;

    protected $table = 'school_student';
    protected $primaryKey = 'school_student_id';
    protected $fillable = ['school_reg_id', 'student_id', 'school_id', 'school_active', 'status', 'created_by', 'update_by'];
}
