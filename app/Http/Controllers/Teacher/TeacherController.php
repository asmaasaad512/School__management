<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeachers;
use App\Repository\TeacherRepositoryInterface;

class TeacherController extends Controller
{
    protected $Teacher;

    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $data['Teachers']=  $this->Teacher->getAllTeachers();
     return view('pages.Teachers.Teachers')->with($data);  
    }
    public function create()
    {
         $specializations = $this->Teacher->Getspecialization();
         $genders = $this->Teacher->GetGender();
         return view('pages.Teachers.create',compact('specializations','genders'));
    }
    public function store(StoreTeachers $request)
    {
      return $this->Teacher->StoreTeachers($request);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $data['Teachers'] = $this->Teacher->editTeachers($id);
        $data['specializations'] = $this->Teacher->Getspecialization();
        $data['genders'] = $this->Teacher->GetGender();
        return view('pages.Teachers.edit')->with($data);
    }


    public function update(Request $request)
    {
        return $this->Teacher->UpdateTeachers($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Teacher->DeleteTeachers($request);
        
    }

    
}
