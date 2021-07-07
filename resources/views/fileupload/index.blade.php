@extends('layouts.app')
@section('content')
  <div class="container">
  	<div class="row">
  		<div class="col-md-8">
  			<h3>File Listing</h3>
  		</div>
		  @if(Auth::user()->admin ==1)
  		<div class="col-md-4"><a href="{{route('user.index')}}" class="btn btn-sm btn-success">User List</a>&nbsp;<a href="{{route('fileupload.create')}}" class="btn btn-sm btn-success">Upload New File</a></div>
		  @else<div class="col-md-4"><a href="{{route('fileupload.create')}}" class="btn btn-sm btn-success">Upload New File</a></div>
  		@endif
	  </div>
  	@if($message = Session::get('success'))
  	<div class="alert alert-success">
  		<p>{{$message}}</p>
  	</div>
  	@endif
    <table class="table table-hover table-sm">
    	<tr>
    		<th width="50px"><b>No:</b></th>
			<th width="300px"><b>User</b></th>
    		<th><b>File</b></th>
    		<th><b>Options</b></th>
    	</tr>
    	@foreach($fileuploads as $fileupload)
    	<tr>
    		<td>{{++$i}}</td>
    		<td>{{$fileupload->user_name}}</td>
    		<td>{{$fileupload->doc}}</td>
    		<td>
    			<form action="{{ route('fileupload.destroy',$fileupload->id)}}" method="post">
    				<a target="_blank" class="btn btn-sm btn-success" href="{{'docs/'.$fileupload->doc}}">View</a>
    				<!-- <a class="btn btn-sm btn-warning" href="{{ route('fileupload.edit',$fileupload->id)}}">Edit</a> -->
    				{{ csrf_field() }}
                    {{ method_field('DELETE')}} 
    				<button type="submit" name="" class="btn btn-sm btn-danger">Delete</button> 
    			</form>
    		</td>
    	</tr>
    	@endforeach
    </table>
    {!! $fileuploads->links() !!}
  </div>
@endsection