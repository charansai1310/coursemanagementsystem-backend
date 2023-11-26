<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'programid', 'instructorid', 'start', 'end'];

    public function announcements(){
        return $this->hasMany(Announcement::class, 'courseid')->get();
    }

    public function assessments(){
        return $this->hasMany(Assessment::class, 'courseid');
    }

    public function instructor(){
        return $this->hasOne(User::class, 'instructorid');
    }

}
