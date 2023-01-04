<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;
    protected $table = 'public_contact';
    protected $primaryKey = 'contact_id';
    protected $fillable = ["name","mobile", "email", "message", "status", "update_by"];
}
