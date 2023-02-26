<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Nationality extends Model
{
    protected $guarded= ['id' ,'created_at','updated_at'];
    use HasFactory;
  
    public function name($lang = null){
     $lang= $lang ?? App::getLocale();   
     return json_decode($this->name)->$lang;
    }
      //relationship between student
      public function students()
      {
          return $this->hasMany(Student::class);
      }
      public function Parents()
      {
          return $this->hasMany(Parent::class);
      }
    //Parent

}
