<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentStudent extends Model
{
    use HasFactory;
    protected $guarded= ['id' ,'created_at','updated_at'];
    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }
}
