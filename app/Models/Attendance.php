<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $guarded= ['id' ,'created_at','updated_at'];
    public function teacher(){
        return $this->belongsTo(Teacher::class); 
       }
       public function student()
       {
           return $this->belongsTo(Student::class);
       }
       public function grade(){
        return $this->belongsTo(Grade::class); 
       }
       public function classroom(){
        return $this->belongsTo(Classroom::class); 
       }
       public function section()
       {
           return $this->belongsTo(Section::class);
       }
}
