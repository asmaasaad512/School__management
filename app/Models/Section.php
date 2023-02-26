<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    protected $guarded = ['id' ,'created_at','updated_at'];
    use HasFactory;
    public function classroom(){
        return $this->belongsTo(Classroom::class); 
       }
       public function grade(){
        return $this->belongsTo(Grade::class); 
       }

        //relationship between student
    public function students()
    {
        return $this->hasMany(Student::class);
    }
           // علاقة الاقسام مع المعلمين
   
       public function teachers(){
        return $this->belongsToMany(Teacher::class, 'teacher_section'); 
       }
    //    public function teachers()
    //    {
    //        return $this->belongsToMany('App\Models\Teacher','teacher_section');
    //    }
    public function name_Section($lang = null){
        $lang=$lang ?? App::getLocale();
    
        return json_decode($this->name_Section)->$lang;
       }
}
