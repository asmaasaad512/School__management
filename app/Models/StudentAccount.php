<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Model
{
    protected $guarded= ['id' ,'created_at','updated_at'];
    use HasFactory;
    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }
}
