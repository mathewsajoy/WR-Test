@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-success">
                        You are logged in as a Admin!
                    </div>
                    <table class="table table-bordered table-hover ">
                        <tr>
                            <th>No:</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Options</th>
                        </tr>
                        @foreach($users as $key=>$user)
                        <tr>
                            <td>{{$key}}</td>
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
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
