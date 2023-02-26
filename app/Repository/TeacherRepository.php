<?php

namespace App\Repository;
use Exception;
use App\Models\Gender;
use App\Models\Teacher;
use App\Models\Specialization;
use Directory;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface{

  public function getAllTeachers(){
      return Teacher::all();
  }
  public function Getspecialization(){
    return Specialization::all();
}

public function GetGender(){
   return Gender::all();
}

public function StoreTeachers($request){

try {
        $Teachers = new Teacher();
        $Teachers->Email = $request->Email;
        $Teachers->Password = Hash::make($request->Password);
        $Teachers->name = json_encode([
            'en' => $request-> Name_en,
            'ar' => $request -> Name_ar 
        ]);
        $Teachers->Specialization_id = $request->Specialization_id;
        $Teachers->Gender_id = $request->Gender_id;
        $Teachers->Joining_Date = $request->Joining_Date;
        $Teachers->Address = $request->Address;
        $Teachers->save();
        toastr()->success(trans('messages.success'));
          return redirect(url('teachers'));
    }
    catch (Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }

}


public function editTeachers($id)
{
    return Teacher::findOrFail($id);
}


public function UpdateTeachers($request)
{
    try {
        $Teachers = Teacher::findOrFail($request->id);
        $Teachers->Email = $request->Email;
        $Teachers->Password =  Hash::make($request->Password);
        $Teachers->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
        $Teachers->Specialization_id = $request->Specialization_id;
        $Teachers->Gender_id = $request->Gender_id;
        $Teachers->Joining_Date = $request->Joining_Date;
        $Teachers->Address = $request->Address;
        $Teachers->save();
        toastr()->success(trans('messages.Update'));
      return back();
    }
    catch (Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }
}


public function DeleteTeachers($request)
{
    try {
    Teacher::findOrFail($request->id)->delete();
    toastr()->success(trans('messages.Delete'));
    return redirect(url('teachers'));
    }
    catch (Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }
}

}
