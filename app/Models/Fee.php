<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fee extends Model
{
    use HasFactory;
    protected $guarded= ['id' ,'created_at','updated_at'];
    public function title($lang = null){
        $lang=$lang ?? App::getLocale();
    
        return json_decode($this->title)->$lang;
       }
       public function classroom(){
        return $this->belongsTo(Classroom::class);     
      }
     
      public function grade(){
        return $this->belongsTo(Grade::class);     
      }
}
