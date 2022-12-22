<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_school_class extends Model
{
    use HasFactory;
    protected $table = 'student_school_class';
    protected $fillable = ['student_school_class_id', 'student_id', 'school_id', 'class_id', 'school_student_id', 'roll_no', 'session_id', 'year', 'admission_date','class_active_status', 'created_by', 'update_by'];
}
