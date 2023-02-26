<?php

namespace App\Repository;

use App\Http\Requests\StoreStudentRequest;

interface StudentRepositoryInterface{

    // get all Teachers
    // get all Teachers
 
  public function store_Students(StoreStudentRequest $request);
  public Function index();
  public function edit($id);
  public function update($request);
  public function destory($request);
  public Function show($id);   
  public Function Upload_attachment($request);   

  public Function Download_attachment($studentName,$filename);
  public Function Delete_attachment($request);
}

