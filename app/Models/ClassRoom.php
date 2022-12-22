<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;
    protected $table = 'classroom';
    protected $primaryKey = 'classroom_id ';
    protected $fillable = ["class_name","class_sl_no", "section", "school_id", "created_by", "update_by"];
}
