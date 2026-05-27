<?php

namespace App\Models;

use App\Models\student;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table ='courses';   
     protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function students()
{
    return $this->hasMany(student::class);
}
}
