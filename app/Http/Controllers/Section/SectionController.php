<?php

namespace App\Http\Controllers\Section;

use Exception;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSections;

class SectionController extends Controller
{
    
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $Grades = Grade::with(['Sections'])->get();
    $list_Grades = Grade::all();
    $teachers = Teacher::all();
    return view('pages.Sections.Sections',compact('Grades','list_Grades','teachers'));

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreSections $request)
  {

    try {

      $validated = $request->validated();
      $Sections = new Section();
      $Sections->name_Section = json_encode([
        'en' => $request-> Name_Section_En,
        'ar' => $request -> Name_Section_Ar 
    ]);
      
      $Sections->grade_id = $request->Grade_id;
      $Sections->classroom_id = $request->Class_id;
      $Sections->Status = 1;
      $Sections->save();
      $Sections->teachers()->attach($request->teacher_id);
     
      toastr()->success(trans('messages.success'));

      return back();
  }

  catch (\Exception $e){
    
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }

  }


  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(StoreSections $request)
  {

    try {
      $validated = $request->validated();
      $Sections = Section::findOrFail($request->id);

      $Sections->name_Section = 
      json_encode([
        'en' => $request->Name_Section_En ,
        'ar' => $request->Name_Section_Ar, 
    ]);
      
      $Sections->grade_id = $request->Grade_id;
      $Sections->classroom_id = $request->Class_id;

      if(isset($request->teacher_id)) {
      $Sections->teachers()->sync($request->teacher_id);
      } else {
      $Sections->teachers->sync(array());
      }

      if(isset($request->Status)) {
        $Sections->Status = 1;
      } else {
        $Sections->Status = 2;
      }


      //  // update pivot tABLE
      //   if (isset($request->teacher_id)) {
      //       $Sections->teachers()->sync($request->teacher_id);
      //   } else {
      //       $Sections->teachers()->sync(array());
      //   }


      $Sections->save();
      toastr()->success(trans('messages.Update'));

      return back();
  }
  catch
  (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(request $request)
  {
    try{
      Section::findOrFail($request->id)->delete();
      toastr()->success(trans('messages.Delete'));
      return back();
    }catch(Exception $e){
      toastr()->error(trans('messages.NoDelete'));
      return back();
    }
   

  }

  public function getclasses($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("name", "id");

        return $list_classes;
    }
}
