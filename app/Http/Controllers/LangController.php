<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function lang($lang , Request $request){
        $acceptlang=['ar','en']; 
       
        if(!in_array($lang , $acceptlang)){
         $lang='en';  
         }
        $request->session()->put('lang',$lang);
         return back();
   }
}
