@include('inc.errors')
<form method="post" action="{{url('register')}}">
  @csrf
  <div class="col-6">
  <div class="form-group">
<label>Name</label>
<input class="input" type="text" name="name" placeholder="Name">
</div>
  </div>
<div class="col-6">
  <div class="form-group">
<label for="exampleInputPassword1">Email</label>
<input class="input" type="email" name="email" placeholder="Email">
</div>
  </div>
  <div class='col-6'>
 <div class="form-group">
<label for="desc_en">password</label>
<input class="input" type="password" name="password" placeholder="Password">
</div>
 </div>
 <div class='col-6'>
 <div class="form-group">
<label for="desc_en">password</label>
<input class="input" type="password" name="password_confirmation" placeholder="Confirm Password">
 </div>
 <button type="submit" class="main-button icon-button pull-right">Sign up</button>
</div>
</div>
</form>
<!--end form-->

								