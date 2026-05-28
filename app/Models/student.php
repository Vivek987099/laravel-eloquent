<?php

namespace App\Models;

use App\Models\Course;
use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

   

   public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function setNameAttribute($value){
        $this -> attributes['name'] = ucwords($value);
    }

    

}
