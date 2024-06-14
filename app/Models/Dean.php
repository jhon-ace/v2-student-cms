<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Dean extends Model
{
    use HasFactory;

    protected $fillable = [
        'dean_fullname',
        'dean_status',
        'department_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // public function department()
    // {
    //     return $this->belongsTo('App\Models\Department');
    // }

  
}
