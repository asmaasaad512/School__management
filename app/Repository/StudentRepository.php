<?php

namespace App\Repository;

use Directory;
use Exception;
use App\Models\Grade;
use App\Models\Image;
use App\Models\Gender;
use App\Models\Religon;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\MyParent;
use App\Models\Classroom;
use App\Models\Blood_type;
use App\Models\Nationality;
use App\Models\Specialization;
use Flasher\Laravel\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreStudentRequest;
use App\Repository\StudentRepositoryInterface;

class StudentRepository implements StudentRepositoryInterface{

  public Function index(){
    $data['students'] =Student::get();
     return view('pages.Students.index')->with($data);
   }

   public Function show($id){
    $data['Student']=Student::FindOrFail($id);
   $data['Genders']=Gender::GET();
   $data['Grades']=Grade::GET();
   $data['nationals']=Nationality::GET();
   $data['bloods']=Blood_type::get();
   $data['parents']=MyParent::get();
    return view('pages.Students.show')->with($data);
     
   }
  

  public function create_Student(){
    $data['Genders']=Gender::all();
    $data['nationals']=Nationality::all();
    $data['Religons']=Religon::all();
    $data['bloods']=Blood_type::all();
    $data['Grades']=Grade::all();
    $data['my_classes']=Classroom::all();
    $data['Sections']=Section::all();
    $data['parents'] =MyParent::get();
    return view('pages.Students.add')->with($data);
   }
 
  public function store_Students(StoreStudentRequest $request){
    DB::beginTransaction();
   try{
 
     $Students = new Student();
     $Students->name = json_encode([
       'en' => $request-> name_en,
       'ar' => $request -> name_ar 
   ]);
    
      $Students->email  = $request->email;
      $Students->Password = Hash::make($request->Password);
   
      $Students->gender_id = $request->gender_id;
      $Students->nationalitie_id = $request->nationalitie_id;
      $Students->blood_type_id  = $request->blood_type_id;
      $Students->Date_Birth = $request->Date_Birth;
      $Students->classroom_id  = $request->classroom_id ;
      $Students->section_id  = $request->section_id ;
      $Students->grade_id = $request->grade_id ;
      $Students->my__parent_id=$request->parent_id;
      $Students->academic_year = $request->academic_year;
      $Students->save();

      if($request->hasFile('photos')){
        foreach($request->file('photos') as $file){
        $nameFile = $file->getClientOriginalName();
       
        $file->storeAs('attachments/students/'.$Students->name('en'), $file->getClientOriginalName(),'upload_attachments');
       
        $images=new Image();
        
   
        $images->filename= $nameFile;
        $images->imageable_id = $Students->id;
        $images->imageable_type = 'App\Models\Student';
        $images->save();
       
       }
      
      }
      DB::commit(); // insert data
        
     toastr()->success(trans('messages.success'));
       return redirect(url('Students.index'));
   }catch(Exception $e){
     return redirect()->back()->with(['error' => $e->getMessage()]);
   
   }
  
 
 
  }
  public function edit($id){
    $data['Student']=Student::FindOrFail($id);
    $data['Genders']=Gender::GET();
    $data['Grades']=Grade::GET();
    $data['nationals']=Nationality::GET();
    $data['bloods']=Blood_type::get();
    $data['parents']=MyParent::get();
     return view('pages.Students.edit')->with($data);
    }
   

  public function update($request){
 
  $Students=Student::FindOrFail($request->id);
  try{
   
     $Students->name = json_encode([
       'en' => $request-> name_en,
       'ar' => $request -> name_ar , 
     ]);
    
      $Students->email  = $request->email;
      $Students->Password = Hash::make($request->Password);
   
      $Students->gender_id = $request->gender_id;
      $Students->nationalitie_id = $request->nationalitie_id;
      $Students->blood_type_id  = $request->blood_type_id;
      $Students->Date_Birth = $request->Date_Birth;
      $Students->classroom_id  = $request->classroom_id ;
      $Students->section_id  = $request->section_id ;
      $Students->grade_id = $request->grade_id ;
      $Students->my__parent_id=$request->parent_id;
      $Students->academic_year = $request->academic_year;
      
      
      $Students->save();
      toastr()->success(trans('messages.Update'));
      return redirect(url('Students.index'));
 
   
   
   
   
 }catch(Exception $e){
   return redirect()->back()->with(['error' => $e->getMessage()]);
 
 }
 
   
  }
 
 
  public function destory($request)
   {
   // Delete img in server disk
    Storage::disk('upload_attachments')->deleteDirectory('attachments/students/'.$request->student_name);
    
   
    image::where('imageable_id',$request->id)->delete();
    

  //  // Delete in data
   image::where('imageable_id',$request->id)->delete();
  //  student::onlyTrashed()->where('id', $request->id)->first()->forceDelete();
    //  Student::destroy($request->id); 
     Student::where('id', $request->id)->first()->forceDelete();
      toastr()->success(trans('messages.Delete'));
      return redirect(url('Students.index'));
  } 

  /// attachment
   public Function Upload_attachment($request){
    
    if($request->hasFile('photos')){
      foreach($request->file('photos') as $file){
      $nameFile = $file->getClientOriginalName();
     
      $file->storeAs('attachments/students/'.$request->student_name, $file->getClientOriginalName(),'upload_attachments');
    
      $images=new Image();
      
      $images->filename= $nameFile;
      $images->imageable_id = $request->student_id;
      $images->imageable_type = 'App\Models\Student';
      $images->save();
     
     }
    
    }
    
      
   toastr()->success(trans('messages.success'));
     return back();
  
 }

 public Function Download_attachment($studentName ,$filename){
        
  return response()->download(public_path('attachments/students/'.$studentName.'/'.$filename));
   }
 /////// Delete_attachment

public function Delete_attachment($request)
{
    // Delete img in server disk
    Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->filename);

    // Delete in data
    image::where('id',$request->id)->where('filename',$request->filename)->delete();
    toastr()->success(trans('messages.Delete'));
    return redirect(url('Student.show',$request->student_id));
}
}