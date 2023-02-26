<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyParent extends Model
{
    use HasFactory;
    protected $table='my__parents';
    protected $guarded= ['id' ,'created_at','updated_at'];
  
    //Translate
    public function Name_Father($lang = null){
        $lang=$lang ?? App::getLocale();
    
        return json_decode($this->Name_Father)->$lang;
       }
       public function Job_Father($lang = null){
        $lang=$lang ?? App::getLocale();
    
        return json_decode($this->Job_Father)->$lang;
       }
       public function Name_Mother($lang = null){
        $lang=$lang ?? App::getLocale();
    
        return json_decode($this->Name_Mother)->$lang;
       }
       public function Job_Mother($lang = null){
        $lang=$lang ?? App::getLocale();
    
        return json_decode($this->Job_Mother)->$lang;
       } 
       //Relation Student

       public function students(){
        return $this->hasMany(student::class);     
      }
       //Relation between Father 
       public function Nationality_Father(){
        return $this->belongsTo(Nationality::class,'Nationality_Father_id','id');     
      }

      public function Blood_Type_Father(){
        return $this->belongsTo(Blood_type::class,'Blood_Type_Father_id','id');     
      }
      public function Religion_Father(){
        return $this->belongsTo(Religon::class,'Religion_Father_id','id');     
      }

       //Relation between Mother
       public function Nationality_Mother(){
        return $this->belongsTo(Nationality::class,'Nationality_Mother_id','id');     
      }

      public function Blood_type_Mother(){
        return $this->belongsTo(Blood_type::class,'Blood_Type_Mother_id','id');     
      }
      public function Religon_Mother(){
        return $this->belongsTo(Religon::class,'Religion_Mother_id','id');     
      }
}
