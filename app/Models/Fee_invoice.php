<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee_invoice extends Model
{
    use HasFactory;
    protected $guarded= ['id' ,'created_at','updated_at'];
    public function grade(){
        return $this->belongsTo(Grade::class); 
       }
       public function classroom()
       {
           return $this->belongsTo(Classroom::class);
       }
       public function student()
       {
           return $this->belongsTo(Student::class);
       }
       public function fees()
       {
           return $this->belongsTo(Fee::class ,'fee_id' ,'id');
       }
       
    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }
}
