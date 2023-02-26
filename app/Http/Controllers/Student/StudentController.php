<?php

namespace App\Http\Controllers\Student;

use App\Models\Section;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Repository\StudentRepositoryInterface;

class StudentController extends Controller
{


  
  public function __construct(StudentRepositoryInterface $Student)
  {
     $this->Student = $Student;
  }
    public function index()
    {
     return $this->Student->index(); 
    }
  
    public function show($id)
    {
     return $this->Student->show($id); 
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function create()
    {
      return $this->Student->create_Student() ;
    }
  
    public function store(StoreStudentRequest $request)
    {
     return $this->Student->store_Students($request);
    }
    public function edit($id){
      return $this->Student->edit($id); 
   
    }   
    
  
  
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(StoreStudentRequest  $request)
    {
     
     return $this->Student->update($request); 
    }
  
    
    public function destory(Request $request)
    {
        
     return $this->Student->destory($request); 
    }
  
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
            // attachment

            public Function Upload_attachment(Request $request){
        
             return $this->Student->Upload_attachment($request);
              }
              public Function Download_attachment($studentName, $filename){
        
                return $this->Student-> Download_attachment($studentName, $filename);
               
                 }
             
       public Function Delete_attachment(Request $request){
   
    return $this->Student->Delete_attachment( $request);
     }
}
