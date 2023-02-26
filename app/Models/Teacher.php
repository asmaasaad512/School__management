<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\CssSelector\Node\Specificity;

class Teacher extends Model
{
    protected $guarded= ['id' ,'created_at','updated_at'];
    use HasFactory;
   
    public function specialization(){
      return $this->belongsTo(Specialization::class , 'Specialization_id' , 'id' );     
    }
    public function gender(){
        return $this->belongsTo(Gender::class,'Gender_id','id');     
      }
       public function sections(){
        return $this->belongsToMany(Section::class , 'teacher_section'); 
       }
    public function name($lang = null){
        $lang=$lang ?? App::getLocale();
    
        return json_decode($this->name)->$lang;
       }
}
