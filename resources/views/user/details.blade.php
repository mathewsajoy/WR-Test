@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Details</h3>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<strong>Name : </strong> {{$user->name}}
		</div>
		<div class="col-md-12">
			<strong>Email : </strong> {{$user->email}}
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<a href="{{ route('user.index')}}" class="btn btn-sm btn-success">Back</a>
		</div>
	</div>
</div>



@endsection