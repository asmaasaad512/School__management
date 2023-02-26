<?php

namespace App\Http\Controllers\Parent;

use Exception;
use App\Models\Religon;
use App\Models\MyParent;
use App\Models\Blood_type;
use App\Models\Nationality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreParentRequest;

class ParentController extends Controller
{
    public function create(){
       
        $data['nationals']=Nationality::all();
        $data['Religons']=Religon::all();
        $data['bloods']=Blood_type::all();
        // $data['Grades']=Grade::all();
        // $data['my_classes']=Classroom::all();
        // $data['Sections']=Section::all();
     return view('pages.Parent.add-parent')->with($data);   
    }

    public function store(Request $request){
     
     $request->validate([

        //Father
        'Email' => 'required|unique:my__parents,Email',
        'Password' => 'required',
        'Name_Father_ar' => 'required',
        'Name_Father_en' => 'required',
        'Job_Father_en' => 'required',
        'Job_Father_en' => 'required',
        'National_ID_Father' => 'required|unique:my__parents,National_ID_Father,',
        'Passport_ID_Father' => 'required|unique:my__parents,Passport_ID_Father,',
        'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'Nationality_Father_id' => 'required',
        'Blood_Type_Father_id' => 'required',
        'Religion_Father_id' => 'required',
        'Address_Father' => 'required',

        //Mother

        'Name_Mother_ar' => 'required',
        'Name_Mother_en' => 'required',
        'National_ID_Mother' => 'required|unique:my__parents,National_ID_Mother',
        'Passport_ID_Mother' => 'required|unique:my__parents,Passport_ID_Mother',
        'Phone_Mother' => 'required',
        'Job_Mother_ar' => 'required',
        'Job_Mother_en' => 'required',
        'Nationality_Mother_id' => 'required',
        'Blood_Type_Mother_id' => 'required',
        'Religion_Mother_id' => 'required',
        'Address_Mother' => 'required',

     ]);   
    
     MyParent::create([
    //Father
    'Email' => $request->Email ,
    'Password' => $request->Password,
    'National_ID_Father' =>$request->National_ID_Father,
    'Passport_ID_Father' =>$request->Passport_ID_Father ,
    'Phone_Father' => $request->Phone_Father,
    'Nationality_Father_id' => $request->Nationality_Father_id,
    'Blood_Type_Father_id' => $request->Blood_Type_Father_id,
    'Religion_Father_id' => $request->Religion_Father_id ,
    'Address_Father' => $request->Address_Father,
    'Name_Father' =>json_encode([
        'en'=>$request->Name_Father_en, 
        'ar'=>$request->Name_Father_ar, 
       ]),
       'Job_Father' =>json_encode([
        'en'=>$request->Job_Father_en, 
        'ar'=>$request->Job_Father_en, 
       ]),  
      //Mother
      'National_ID_Mother' =>$request->National_ID_Mother,
      'Passport_ID_Mother' =>$request->Passport_ID_Mother ,
      'Phone_Mother' => $request->Phone_Mother,
      'Nationality_Mother_id' => $request->Nationality_Mother_id,
      'Blood_Type_Mother_id' => $request->Blood_Type_Mother_id,
      'Religion_Mother_id' => $request->Religion_Mother_id ,
      'Address_Mother' => $request->Address_Mother,
      'Name_Mother' =>json_encode([
          'en'=>$request->Name_Mother_en, 
          'ar'=>$request->Name_Mother_ar, 
         ]),
         'Job_Mother' =>json_encode([
          'en'=>$request->Job_Mother_en, 
          'ar'=>$request->Job_Mother_en, 
         ]),  
     ]);
     toastr()->success(trans('messages.success'));  
     return back();
    }

public function showParent(){
$data['my_parents']=MyParent::get();
return view('pages.Parent.Parent_Show')->with($data);  
}
// Edite Parent
public function edite($id){
 $data['Parent']=MyParent::findOrFail($id); 
 $data['nationals']=Nationality::all();
 $data['Religons']=Religon::all();
 $data['bloods']=Blood_type::all(); 
 return view('pages.Parent.edite-parent')->with($data);    
}

public function update(Request $request , $id){
$Parent =MyParent::findOrFail($id);

$request->validate([

    //Father
    'Email' => 'required',
    'Password' => 'required',
    'Name_Father_ar' => 'required',
    'Name_Father_en' => 'required',
    'Job_Father_en' => 'required',
    'Job_Father_en' => 'required',
    'National_ID_Father' => 'required',
    'Passport_ID_Father' => 'required',
    'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
    'Nationality_Father_id' => 'required',
    'Blood_Type_Father_id' => 'required',
    'Religion_Father_id' => 'required',
    'Address_Father' => 'required',

    //Mother

    'Name_Mother_ar' => 'required',
    'Name_Mother_en' => 'required',
    'National_ID_Mother' => 'required',
    'Passport_ID_Mother' => 'required',
    'Phone_Mother' => 'required',
    'Job_Mother_ar' => 'required',
    'Job_Mother_en' => 'required',
    'Nationality_Mother_id' => 'required',
    'Blood_Type_Mother_id' => 'required',
    'Religion_Mother_id' => 'required',
    'Address_Mother' => 'required',

 ]);   

 $Parent->update([
//Father
'Email' => $request->Email ,
'Password' => $request->Password,
'National_ID_Father' =>$request->National_ID_Father,
'Passport_ID_Father' =>$request->Passport_ID_Father ,
'Phone_Father' => $request->Phone_Father,
'Nationality_Father_id' => $request->Nationality_Father_id,
'Blood_Type_Father_id' => $request->Blood_Type_Father_id,
'Religion_Father_id' => $request->Religion_Father_id ,
'Address_Father' => $request->Address_Father,
'Name_Father' =>json_encode([
    'en'=>$request->Name_Father_en, 
    'ar'=>$request->Name_Father_ar, 
   ]),
   'Job_Father' =>json_encode([
    'en'=>$request->Job_Father_en, 
    'ar'=>$request->Job_Father_en, 
   ]),  
  //Mother
  'National_ID_Mother' =>$request->National_ID_Mother,
  'Passport_ID_Mother' =>$request->Passport_ID_Mother ,
  'Phone_Mother' => $request->Phone_Mother,
  'Nationality_Mother_id' => $request->Nationality_Mother_id,
  'Blood_Type_Mother_id' => $request->Blood_Type_Mother_id,
  'Religion_Mother_id' => $request->Religion_Mother_id ,
  'Address_Mother' => $request->Address_Mother,
  'Name_Mother' =>json_encode([
      'en'=>$request->Name_Mother_en, 
      'ar'=>$request->Name_Mother_ar, 
     ]),
     'Job_Mother' =>json_encode([
      'en'=>$request->Job_Mother_en, 
      'ar'=>$request->Job_Mother_en, 
     ]),  
 ]);
 toastr()->success(trans('messages.success'));  
 return back();
} 
//function Delete Parent
public Function destory(Request $request){
$Parent= MyParent::FindOrFail($request->id);

try{
    $Parent->Delete();
     toastr()->success(trans('messages.Delete'));
     
    return back();
    
   }catch(Exception $e){
    toastr()->error(trans('messages.NoDelete'));
    return back();
   }

}
}
