<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $table ='students';
    public function courses()
    {
        return $this->belongsTo(Courses::class, 'courses_id', 'id');
    }
}
