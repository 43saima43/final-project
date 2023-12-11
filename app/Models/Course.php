<?php

namespace App\Models;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
