<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'courseid'];

    public function messages(){
        return $this->hasMany(Message::class, 'dissid')->get();
    }
}
