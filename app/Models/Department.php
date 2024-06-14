<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_name',
        'department_description',
        'department_dean',
    ];

    // public function deans()
    // {
    //     return $this->hasMany(Dean::class);
    // }
    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    
}
