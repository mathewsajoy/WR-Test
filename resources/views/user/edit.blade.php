@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
		   <h3>Edit User</h3>
	    </div>
	</div>
	@if($errors->any())
    	<div class="alert alert-danger">Please check your form</div>

    @endif
    <form method="post" action="{{route('user.update',$user->id)}}">
    	{{ csrf_field() }}
    	{{ method_field('PUT')}}  
	<div class="row">
		<div class="col-md-12">
			<strong>Name:</strong>
			<input type="text" name="name" value="{{ $user->name }}" class="form-control">
		</div>
		<div class="col-md-12">
			<strong>Email:</strong>
			<input type="text" name="email" value="{{ $user->email }}" class="form-control">
		</div>
		</br>
		<div class="clearfix"></div>
		</br>
		<div class="col-md-12">
			<a href="{{ route('user.index') }}" class="btn btn-sm btn-success">Back</a>
            <button type="submit" class="btn-primary btn-sm btn">Update</button>
		</div>
	</div>
    </form>
</div>



@endsection