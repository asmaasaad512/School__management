<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangController;
use App\Http\Controllers\Grade\GradeController;
use App\Http\Controllers\Parent\ParentController;
use App\Http\Controllers\Grade\ClassroomController;
use App\Http\Controllers\Section\SectionController;
use App\Http\Controllers\Student\AttendanceController;
use App\Http\Controllers\Student\FeeController;
use App\Http\Controllers\Student\FeesInvoicesController;
use App\Http\Controllers\Student\GraduatedController;
use App\Http\Controllers\Student\PaymentStudentController;
use App\Http\Controllers\Student\ProcessingFeeController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Student\PromotionController;
use App\Http\Controllers\Student\ReceiptStudentController;
use App\Http\Controllers\subject\SubjectController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('lang')->group(function(){


    Route::get('/', function()
    {
        return view('pages.dashboard');
     });
     Route::get('grades',[GradeController::class,'index'] );
     Route::post('Grades.store',[GradeController::class,'store'] );
     Route::post('Grades/update',[GradeController::class,'update'] );
     Route::post('Grades/destroy',[GradeController::class,'delete'] );

     Route::get('classrooms',[ClassroomController::class,'index'] );
     Route::post('classrooms/store',[ClassroomController::class,'store'] );
     Route::post('classrooms/update',[ClassroomController::class,'update'] );
     Route::post('classrooms/destroy',[ClassroomController::class,'delete'] );
     Route::post('delete_all',[ClassroomController::class,'deleteAll'] );
     Route::POST('Filter_Classes',[ClassroomController::class,'Filter_Classes'] ); 
    
     //section 
     Route::get('Sections.index',[SectionController::class,'index'] );
     Route::post('Sections.store',[SectionController::class,'store'] );
     Route::post('Sections.update',[SectionController::class,'update'] );
     Route::post(' Sections.destroy',[SectionController::class,'destroy'] );
    
     Route::get('/classes/{id}',[SectionController::class,'getclasses']);
     //Teacher   
    
    Route::get('teachers',[TeacherController::class,'index'] );
    Route::get('Teachers.create',[TeacherController::class,'create'] );
    Route::post('Teachers.store',[TeacherController::class,'store'] );
    Route::get('Teachers.edit/{id}',[TeacherController::class,'edit'] );
    Route::post('Teachers.update',[TeacherController::class,'update'] ); 
    Route::Post('Teachers.destroy',[TeacherController::class,'destroy'] );
   
   
    //parent
   Route::get('add_parent',[ParentController::class,'create'] );
   Route::post('Parent.store',[ParentController::class,'store'] );
   Route::get('parent_Show',[ParentController::class,'showParent'] );
   Route::get('parent_Show',[ParentController::class,'showParent'] );
   Route::get('parent_Edite/{id}',[ParentController::class,'edite'] );
   Route::post('parent_update/{id}',[ParentController::class,'update'] );

   //student 
    Route::get('Students.create',[StudentController::class,'create'] );
    Route::post('Students.store',[StudentController::class,'store'] );
    Route::get('Students.index',[StudentController::class,'index'] );
    Route::get('Student.show/{id}',[StudentController::class,'show'] );
    Route::get('Students.edit/{id}',[StudentController::class,'edit'] );
    Route::post('Students.update',[StudentController::class,'update'] );
    Route::post('Students.destroy',[StudentController::class,'destory'] );


  
    Route::post('Upload_attachment',[StudentController::class,'Upload_attachment'] ); 
   
    Route::get('Download_attachment/{studentName}/{filename}',[StudentController::class,'Download_attachment'] ); 
    Route::post('Delete_attachment',[StudentController::class,'Delete_attachment'] ); 
    Route::get('/Get_classrooms/{id}',[StudentController::class,'getclasses']);
    Route::get('/Get_Sections/{id}',[StudentController::class,'getsections']);
    //Promotion
   
    Route::get('Promotion.index',[PromotionController::class,'index'] );
    Route::post('Promotion.store',[PromotionController::class,'store'] ); 
    Route::get('Promotion.create',[PromotionController::class,'create'] );
    Route::post('Promotion.destroy',[PromotionController::class,'destroy'] );
    Route::post('Promotion.Graduated',[PromotionController::class,'graduated'] );
    
    Route::get('/Get_classrooms/{id}',[PromotionController::class,'getclasses']);
    Route::get('/Get_Sections/{id}',[PromotionController::class,'getsections']);
     // Graduated Student
     Route::get('Graduated.index',[GraduatedController::class,'index'] );
     Route::get('Graduated.create',[GraduatedController::class,'create'] );
     Route::post('Graduated.store',[GraduatedController::class,'store'] );
     Route::post('Graduated.update',[GraduatedController::class,'update'] );
     Route::post('Graduated.destroy',[GraduatedController::class,'destroy'] );
     //Fees
     Route::get('Fees.index',[FeeController::class,'index'] );
     Route::get('Fees.create',[FeeController::class,'create'] );
     Route::post('Fees.store',[FeeController::class,'store'] );
     Route::get('Fees.edit/{id}',[FeeController::class,'edit'] );
     Route::post('Fees.update',[FeeController::class,'update'] );
     Route::post('Fees.destroy',[FeeController::class,'destroy'] );
   //اضافة فاتورة للطلاب
   
   Route::get('Fees_Invoices.index',[FeesInvoicesController::class,'index'] );
   Route::get('Fees_Invoices.show/{id}',[FeesInvoicesController::class,'show'] );
   Route::get('Fees_Invoices.show/{id}',[FeesInvoicesController::class,'show'] );
   Route::post('Fees_Invoices.store',[FeesInvoicesController::class,'store'] );
   //سند قبض
   Route::get('receipt_students.show/{id}',[ReceiptStudentController::class,'show'] );
   Route::post('receipt_students.store',[ReceiptStudentController::class,'store'] );
   Route::get('receipt_student.index',[ReceiptStudentController::class,'index'] );
   Route::get('receipt_student.edit/{id}',[ReceiptStudentController::class,'edit'] );
   Route::post('receipt_students.update',[ReceiptStudentController::class,'update'] );
   Route::post('receipt_students.destroy',[ReceiptStudentController::class,'destroy'] );
   //استبعاد رسوم
   Route::get('ProcessingFee.show/{id}',[ProcessingFeeController::class,'show'] );
   Route::post('ProcessingFee.store',[ProcessingFeeController::class,'store'] );
   Route::get('ProcessingFee.index',[ProcessingFeeController::class,'index'] );
   Route::get('ProcessingFee.edit/{id}',[ProcessingFeeController::class,'edit'] );
   Route::post('ProcessingFee.update',[ProcessingFeeController::class,'update'] );
   Route::post('ProcessingFee.destroy',[ProcessingFeeController::class,'destroy'] );
    /////Payment
    
    Route::get('Payment_student.show/{id}',[PaymentStudentController::class,'show'] );
    Route::post('Payment_students.store',[PaymentStudentController::class,'store'] );
    Route::get('Payment_students.index',[PaymentStudentController::class,'index'] );
   //Attendance.index
   Route::get('Attendance.index',[AttendanceController::class,'index'] );
   Route::get('Attendance.show/{id}',[AttendanceController::class,'show'] );
   Route::post('Attendance.store',[AttendanceController::class,'store'] );
   
   //Subject
   Route::get('subjects.index',[SubjectController::class,'index'] );
   Route::get('subjects.create',[SubjectController::class,'create'] );
   Route::post('subjects.store',[SubjectController::class,'store'] );
   Route::get('subjects.edit/{id}',[SubjectController::class,'edit'] );
   Route::post('subjects.update',[SubjectController::class,'update'] );
   Route::post('subjects.destroy',[SubjectController::class,'destroy'] );
   
    Route::get('test',function(){
      return view('pages.empty');  
     } );
    });
Route::get('lang/{lang}',[LangController::class,'lang'] );
