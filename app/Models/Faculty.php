<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Department;

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'faculty';

    protected $fillable = [
        'faculty_photo',
        'faculty_fullname',
        'email',
        'password',
        'course_taught_id',
        'department_id',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'faculty_password' => 'hashed',
        ];
    }

    // public function course()
    // {
    //     return $this->belongsTo(Course::class);
    // }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_taught_id');
    }

    
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
