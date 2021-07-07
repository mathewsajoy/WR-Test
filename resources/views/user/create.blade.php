@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Create User</h3>
    </div>
  </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> there where some problems with your input.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

  <form method="post" action="{{ route('storeUser') }}">
    {{ csrf_field() }}
    <div class="row">
    <div class="col-md-12">
      <strong>Name:</strong>
      <input type="text" name="name" class="form-control">
      
    </div>
    <div class="col-md-12">
      <strong>Email:</strong>
      <input type="text" name="email" class="form-control">
    </div>
    <div class="col-md-12">
      <strong>Password:</strong>
      <input type="password" name="password" class="form-control">
    </div>

    </br>
    <div class="clearfix"></div>
    </br>
    <div class="col-md-12">
      <a href="{{ route('user.index') }}" class="btn btn-sm btn-success">Back</a>
      <button type="submit" class="btn-primary btn-sm btn">Submit</button>
    </div>
    </div>
  </form>
</div>




@endsection