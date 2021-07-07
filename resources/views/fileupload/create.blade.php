@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Upload File</h3>
    </div>
  </div>

  <form method="post" action="{{ route('storeFileupload') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
    <div class="form-group{{ $errors->has('user_file') ? ' has-error' : '' }}">
        <label for="name" class="col-md-2 control-label">File : </label>
        <div class="col-md-8">
          <input id="profilePicture" type="file" class="form-control" name="user_file">
        </div>
    </div>
    <label for="name" class="col-md-2 control-label">&nbsp;</label>
    <div  class="col-md-8">
    @if ($errors->has('user_file'))
        <span class="help-block">
            <strong>{{ $errors->first('user_file') }}</strong>
        </span>
    @endif
    </div>

    </br>
    <div class="clearfix"></div>
    </br>
    <div class="col-md-12">
      <a href="{{ route('fileupload.index') }}" class="btn btn-sm btn-success">Back</a>
      <button type="submit" class="btn-primary btn-sm btn">Submit</button>
    </div>
    </div>
  </form>
</div>




@endsection