
<!--start form-->
<form  action="{{url('login')}}" method="POST">
  @csrf
<div class="container">
<div class="row">

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
<input class="input" type="checkbox" name="remember">Remember me
</div>
 </div>
 <button type="submit" class="main-button icon-button pull-right">Sign In</button>
</div>
</div>
</form>
<!--end form-->