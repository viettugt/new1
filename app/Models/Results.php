<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;
    protected $table ='results';
    public function students()
    {
        return $this->belongsTo(Students::class, 'students_id', 'id');
    }

    public function subjects()
    {
        return $this->belongsTo(Subjects::class, 'subjects_id', 'id');
    }

}
