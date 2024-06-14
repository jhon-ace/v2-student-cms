<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Program;

class Course extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'course_code',
        'course_name',
        'course_description',
        'course_semester',
        'program_id',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
