<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;
    protected $table ='subjects';
    public function courses()
    {
        return $this->belongsTo(Courses::class, 'courses_id', 'id');
    }
}
