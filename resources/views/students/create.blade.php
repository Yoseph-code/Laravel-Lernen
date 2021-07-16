@extends('students.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Students</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('students.index') }}">Back</a>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('students.store') }}" method="POST">
    @csrf 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>StudentName:</strong>
                <input type="text" name="studname" class="form-control" placeholder="studname">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12"> 
            <div class="form-group">
                <strong>Course</strong>
                <input type="text" name="couse" class="form-control" placeholder="course">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fee</strong>
                <input type="text" name="fee" class="form-control" placeholder="fee">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primmary">Submit</button>
        </div>
</form>
@endsection