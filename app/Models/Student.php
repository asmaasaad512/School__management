<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded= ['id' ,'created_at','updated_at'];

    public function gender(){
        return $this->belongsTo(Gender::class);     
      }
       public function section(){
        return $this->belongsTo(Section::class); 
       }
       
    public function classroom(){
        return $this->belongsTo(Classroom::class);     
      }
      
    public function nationality(){
        return $this->belongsTo(Nationality::class , 'nationalitie_id' ,'id');     
      }
      public function blood(){
        return $this->belongsTo(Blood_type::class , 'blood_type_id' ,'id');     
      }
      public function grade(){
        return $this->belongsTo(Grade::class);     
      }
      public function parent(){
        return $this->belongsTo(MyParent::class , 'my__parent_id' ,'id');     
      }
      public function student_account(){
        return $this->hasMany(StudentAccount::class ,'student_id','id');  
      }
      // علاقة بين جدول الطلاب وجدول الحضور والغياب
    public function attendance()
    {
        return $this->hasMany('App\Models\Attendance', 'student_id');
    }

      //
      public function name($lang = null){
        $lang=$lang ?? App::getLocale();
    
        return json_decode($this->name)->$lang;
       }

       //image
       public function images()
       {
           return $this->morphMany(Image::class, 'imageable');
       }
}
