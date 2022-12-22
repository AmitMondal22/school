<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schoolinfo extends Model
{
    use HasFactory;
    protected $table = 'schoolinfo';
    protected $primaryKey = 'schoolid';
    protected $fillable = ["schoolname", "schoolRegistrationId", "adress", "schoolMobileNo", "pin", "city", "state", "country","created_by","update_by"];
}
