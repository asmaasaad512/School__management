<?php

namespace App\Http\Controllers\Student;

use App\Models\Section;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\StudentPromotionRepository;

class PromotionController extends Controller
{
protected $Promotion;
    public function __construct(StudentPromotionRepository $promotion)
    {
       $this->Promotion = $promotion;
    }
    public function index(){
     return $this->Promotion->index();   
    }
    public function store(Request $request){
        return  $this->Promotion->store($request);   
       }

       public function create(){
        return  $this->Promotion->create();   
       }
       public function destroy(Request $request){
        return  $this->Promotion->destroy($request);  
       }


      public function graduated(Request $request){
        return  $this->Promotion->graduated($request); 
      }
       //end promotion










    public function getclasses($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("name", "id");

        return $list_classes;
    }
    public function getsections($id)
    {
      $list_sections = Section::where("classroom_id", $id)->pluck("name_Section", "id");

        return $list_sections;
    }
}
