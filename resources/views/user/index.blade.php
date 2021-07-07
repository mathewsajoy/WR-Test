@extends('layouts.app')
@section('content')
  <div class="container">
  	<div class="row">
  		<div class="col-md-8">
  			<h3>User Listing</h3>
  		</div>
		<div class="col-md-4"><a href="{{route('fileupload.index')}}" class="btn btn-sm btn-success">Show Files</a>&nbsp;<a href="{{route('user.create')}}" class="btn btn-sm btn-success">Create New User</a></div>
  	</div>
  	@if($message = Session::get('success'))
  	<div class="alert alert-success">
  		<p>{{$message}}</p>
  	</div>
  	@endif
    <table class="table table-hover table-sm">
    	<tr>
    		<th width="50px"><b>No:</b></th>
    		<th width="300px"><b>Name</b></th>
    		<th><b>Email</b></th>
    		<th><b>Options</b></th>
    	</tr>
    	@foreach($users as $user)
    	<tr>
    		<td>{{++$i}}</td>
    		<td>{{$user->name}}</td>
    		<td>{{$user->email}}</td>
    		<td>
    			<form action="{{ route('user.destroy',$user->id)}}" method="post">
    				<a class="btn btn-sm btn-success" href="{{ route('user.show',$user->id)}}">Show</a>
    				<a class="btn btn-sm btn-warning" href="{{ route('user.edit',$user->id)}}">Edit</a>
    				{{ csrf_field() }}
                    {{ method_field('DELETE')}} 
    				<button type="submit" name="" class="btn btn-sm btn-danger">Delete</button> 
    			</form>
    		</td>
    	</tr>
    	@endforeach
    </table>
    {!! $users->links() !!}
  </div>
@endsection