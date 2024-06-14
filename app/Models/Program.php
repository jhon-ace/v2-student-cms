<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Department;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_abbreviation',
        'program_description',
        'status',
        'department_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // public function courses()
    // {
    //     return $this->hasMany(Course::class);
    // }
    
}
