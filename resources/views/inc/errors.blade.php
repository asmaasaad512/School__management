@if($errors->any())
<div class="alert alert-danger">
@foreach($errors->all() as $error)
<p>{{$error}}</p>
@endforeach
</div>
@endif
@if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600 alert alert-success">
        {{ session('status') }}
    </div>
@endif