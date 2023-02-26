<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Repository\AttendanceRepositoryInterface;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    protected $Attendance ;
 Public function __construct(AttendanceRepositoryInterface $attendace)
  {
    $this->Attendance=$attendace;
  }

  public Function index(){
    return   $this->Attendance->index();  
  }
  public function store(Request $request){
    return $this->Attendance->store($request);
  }
  public function show($id){
    return $this->Attendance->show($id); 
  }
}
