@extends('web.layout')
@section('title')
forgot-password
@endsection
@section('content')


<!-- Contact -->
<div id="contact" class="section">

<!-- container -->
<div class="container">

    <!-- row -->
    <div class="row">

        <!-- login form -->
        <div class="col-md-6 col-md-offset-3">
            <div class="contact-form">
                <h4>forgot password</h4>
                @include('web.inc.messages')
                <form action="{{url('forgot-password')}}" method="post" >
                    @csrf
                    <input class="input" type="email" name="email" placeholder="Email">
					
                    <button type="submit" class="main-button icon-button pull-right">Sign In</button>
                </form>
            </div>
        </div>
        <!-- /login form -->

    </div>
    <!-- /row -->

</div>
<!-- /container -->

</div>
<!-- /Contact -->
@endsection