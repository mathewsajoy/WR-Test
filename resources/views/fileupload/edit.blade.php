@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
		   <h3>Edit Biodata</h3>
	    </div>
	</div>
	@if($errors->any())
    	<div class="alert alert-danger">Please check your form</div>

    @endif
    <form method="post" action="{{route('biodata.update',$biodata->id)}}">
    	{{ csrf_field() }}
    	{{ method_field('PUT')}}  
	<div class="row">
		<div class="col-md-12">
			<strong>Name:</strong>
			<input type="text" name="name" value="{{ $biodata->name }}" class="form-control">
		</div>
		<div class="col-md-12">
			<strong>Address:</strong>
			<textarea name="address" class="form-control">{{ $biodata->address }}</textarea>
		</div>
	</br>
		<div class="col-md-12">
			<a href="{{ route('biodata.index') }}" class="btn btn-sm btn-success">Back</a>
            <button type="submit" class="btn-primary btn-sm btn">Update</button>
		</div>
	</div>
    </form>
</div>



@endsection