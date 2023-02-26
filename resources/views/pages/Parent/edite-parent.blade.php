@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('Parent_trans.add_parent')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('Parent_trans.add_parent')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post"  action="{{ url("parent_update/{$Parent->id}") }}" autocomplete="off">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Parent_trans.Step1')}}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Parent_trans.Name_Father_ar')}} : <span class="text-danger">*</span></label>
                                    <input  type="text" name="Name_Father_ar" value="{{$Parent->Name_Father('ar')}}"  class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Parent_trans.Name_Father_en')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="Name_Father_en"value="{{$Parent->Name_Father('en')}}" type="text" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Students_trans.email')}} : </label>
                                    <input type="email" value="{{$Parent->Email}}"  name="Email" class="form-control" >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Students_trans.password')}} :</label>
                                    <input  type="password" name="Password" value="{{$Parent->Password}}" class="form-control" >
                                </div>
                            </div>

                           

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nal_id">{{trans('Students_trans.Nationality')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Nationality_Father_id">
                                      
                                        @foreach($nationals as $nal)
                                            <option  value="{{ $nal->id }}" @if($Parent->National_ID_Father == $nal->id ) selected @endif>{{ $nal->name() }}</option>
                                        @endforeach
                                    </select>          
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bg_id">{{trans('Students_trans.blood_type')}} : </label>
                                    <select class="custom-select mr-sm-2" name="Blood_Type_Father_id">
                                        
                                        @foreach($bloods as $bg)
                                            <option value="{{ $bg->id }}"@if($Parent->Blood_Type_Father_id  == $nal->id ) selected @endif>{{ $bg->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bg_id">{{trans('Students_trans.religion')}} : </label>
                                    <select class="custom-select mr-sm-2" name="Religion_Father_id">
                                       
                                        @foreach($Religons as $R)
                                            <option value="{{ $R->id }}"@if($Parent->Religion_Father_id  == $nal->id ) selected @endif>{{ $R->name() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('Parent_trans.National_ID_Father')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="National_ID_Father"value="{{$Parent->National_ID_Father}}" type="text" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('Parent_trans.Passport_ID_Father')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="Passport_ID_Father" value="{{$Parent->Passport_ID_Father}}" type="text" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('Parent_trans.Phone_Father')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="Phone_Father" value="{{$Parent->Phone_Father}}" type="text" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('Parent_trans.Job_Father')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="Job_Father_ar" value="{{$Parent->Job_Father('ar')}}" type="text" >
                                </div>
                            </div>	
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('Parent_trans.Job_Father_en')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="Job_Father_en"value="{{$Parent->Job_Father('en')}}" type="text" >
                                </div>
                            </div>	
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Parent_trans.Address_Father')}} : <span class="text-danger">*</span></label>
                                    <textarea name="Address_Father"class="form-control" id="" cols="10" rows="5">{{$Parent->Address_Father}}</textarea>
                                </div>
                            </div>
                        </div>
        <!-----Mother---->
          <br><br>
        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Parent_trans.Step2')}}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Parent_trans.Name_Mother')}} : <span class="text-danger">*</span></label>
                                    <input  type="text" name="Name_Mother_ar" value="{{$Parent->Name_Mother('ar')}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Parent_trans.Name_Mother_en')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="Name_Mother_en"value="{{$Parent->Name_Mother('en')}}" type="text" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nal_id">{{trans('Students_trans.Nationality')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Nationality_Mother_id">
                                       
                                        @foreach($nationals as $nal)
                                            <option  value="{{ $nal->id }}" @if($Parent->Nationality_Mother_id  == $nal->id ) selected @endif>{{ $nal->name() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bg_id">{{trans('Students_trans.blood_type')}} : </label>
                                    <select class="custom-select mr-sm-2" name="Blood_Type_Mother_id">
                                    
                                        @foreach($bloods as $bg)
                                            <option value="{{ $bg->id }}" @if($Parent->Blood_Type_Mother_id == $bg->id) selected @endif>{{ $bg->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bg_id">{{trans('Students_trans.religion')}} : </label>
                                    <select class="custom-select mr-sm-2" name="Religion_Mother_id">
                                        
                                        @foreach($Religons as $R)
                                            <option value="{{ $R->id }}" @if($Parent->Religion_Mother_id == $bg->id) selected @endif>{{ $R->name() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('Parent_trans.National_ID_Father')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="National_ID_Mother" value="{{$Parent->National_ID_Mother}}" type="text" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('Parent_trans.Passport_ID_Mother')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="Passport_ID_Mother" value="{{$Parent->Passport_ID_Mother}}" type="text" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="Phone_Mother" value="{{$Parent->Phone_Mother}}" type="text" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('Parent_trans.Job_Mother')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="Job_Mother_ar" value="{{$Parent->Job_Mother('ar')}}"  type="text" >
                                </div>
                            </div>	
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('Parent_trans.Job_Mother_en')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="Job_Mother_en" value="{{$Parent->Job_Mother('en')}}"  type="text" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Parent_trans.Address_Father')}} : <span class="text-danger">*</span></label>
                                    <textarea name="Address_Mother"class="form-control" id="" cols="10" rows="5">{{$Parent->Address_Mother}}</textarea>
                                </div>
                            </div>                      

                   
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')