@extends('layouts.master')
@section('title')
Add courses
@endsection
@section('content')
<div>
    <h4>Add coureses</h4>
    <form action="{{ route('savecourses') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name course</label>
            @error('name')
            <div class="text text-danger">{{$message}}</div>
            @enderror
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Name courses" name="name">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('course') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection