<?php

namespace App\Http\Controllers\Grade;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Exception;
use Illuminate\Http\Request;

class GradeController extends Controller
{
   public function index(){
    $data['Grades'] =Grade::paginate(10);
    return view('pages.Grades.Grades')->with($data);
   }

   public function store(Request $request){


     
      $request->validate([
       'name_en'=>'required|string|max:100', 
       'name_ar'=>'required|string|max:100',
       'notes_en'=>'nullable|string|max:500',
       'notes_ar'=>'nullable|string|max:500',          
       ]);
        
      //  if(Grade::where('name("en")',$request-> name_en)->orwhere('name("ar")',$request-> name_ar)){
      //   return back()->withErrors(trans('Grades_trans.noReapeatGrade'));
      //  }
      
      Grade::create([
       'name'=> json_encode([
         'en' => $request-> name_en,
         'ar' => $request-> name_ar 
       ]),
       'notes'=> json_encode([
         'en' => $request-> notes_en,
         'ar' => $request-> notes_ar 
       ]),
     
      ]);
      toastr()->success(trans('messages.success'));

            return back();
   }
   public function update(Request $request ){
    $Grade=Grade::findOrfail($request->id);
    $request->validate([
      'name_en'=>'required|string|max:100', 
      'name_ar'=>'required|string|max:100',
      'notes_en'=>'nullable|string|max:500',
      'notes_ar'=>'nullable|string|max:500',          
      ]);
     
     $Grade->update([
      'name'=> json_encode([
        'en' => $request-> name_en,
        'ar' => $request -> name_ar 
      ]),
      'notes'=> json_encode([
        'en' => $request-> notes_en,
        'ar' => $request -> notes_ar, 
      ])
     
      ]);
      toastr()->success(trans('messages.Update'));

      return back();
   }
   public function delete(Request $request){
    $Grade=Grade::findOrfail($request->id);
     try{
      $Grade->delete();
       toastr()->success(trans('messages.Delete'));
       
      return back();
      
     }catch(Exception $e){
      toastr()->error(trans('messages.NoDelete'));
      return back();
     }
    
   }
}  