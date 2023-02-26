<?php

namespace App\Models;

use App\Models\Grade;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasFactory;
    protected $guarded= ['id' ,'created_at','updated_at'];
    public function grade(){
        return $this->belongsTo(Grade::class); 
       }
       public function sections()
       {
           return $this->hasMany(Section::class);
       }
       public function students()
       {
           return $this->hasMany(Student::class);
       }
       public function name($lang = null){
        $lang=$lang ?? App::getLocale();
    
        return json_decode($this->name)->$lang;
       }
      
}
