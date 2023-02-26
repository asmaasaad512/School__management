<?php

namespace App\Http\Controllers\Grade;

use Exception;
use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassroomController extends Controller
{
    public function index(){
        $data['My_Classes'] =Classroom::get();
    
        $data['Grades'] =Grade::select('id','name')->get();
        return view('pages.Classrooms.index')->with($data);
       }
    
       public function store(Request $request){
    
    
         
          $request->validate([
           'name_en'=>'required|string|max:100', 
           'name_ar'=>'required|string|max:100',
           'grade_id'=>'required|exists:grades,id',     
           ]);
    
          //  if(Classroom::where("name('en')",$request->name_en)->orWhere("name('ar')",$request-> name_ar)){
          //   return back()->withErrors(trans('My_Classes_trans.noReapeatClassroom'));
          // }
          
       
       Classroom::create([
           'name'=> json_encode([
             'en' => $request-> name_en,
             'ar' => $request -> name_ar 
           ]),
           'grade_id'=>$request-> grade_id,
         
          ]);
      
          toastr()->success(trans('messages.success'));  
                return back();
       }
       public function update(Request $request ){
      
       $Classroom=Classroom::findOrfail($request->id);
       $request->validate([
         'name_en'=>'required|string|max:100', 
         'name_ar'=>'required|string|max:100',
         'grade_id'=>'required|exists:grades,id',             
         ]);
     
         $Classroom->update([

          'grade_id'=>$request-> grade_id,
          'name'=> json_encode([
            'en' => $request-> name_en,
            'ar' => $request -> name_ar 
          ]),
          
         
          ]);
          toastr()->success(trans('messages.Update'));
         
         return back();
       }
       public function delete(Request $request){
        $Classroom=Classroom::findOrfail($request->id);
         try{
          $Classroom->delete();
           toastr()->success(trans('messages.Delete'));
           
          return back();
          
         }catch(Exception $e){
          toastr()->error(trans('messages.NoDelete'));
           
        }
        
       }
       // delete all
       public function deleteAll(Request $request){
        $delete_all_id = explode(",", $request->delete_all_id);

        try{
         Classroom::whereIn('id',$delete_all_id)->Delete();
           toastr()->success(trans('messages.Delete'));
           
          return back();
          
         }catch(Exception $e){
          toastr()->error(trans('messages.NoDelete'));
           
        }
       
       }

       //filter
       public function Filter_Classes(Request $request)
       {
           
         $data['Grades'] =Grade::select('id','name')->get();
           $data['Search'] = Classroom::select('*')->where('grade_id','=',$request->grade_id)->get();
   
          return view('pages.Classrooms.index')->with($data);
       }
}
