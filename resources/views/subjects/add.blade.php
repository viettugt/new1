@extends('layouts.master')
@section('title')
Add Subject
@endsection
@section('content')
<div>
    <h4>Add coureses</h4>
    <form action="{{ route('savesubjects') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name Subjects</label>
            @error('name')
            <div class="text text-danger">{{$message}}</div>
            @enderror
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Name Subjects" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Course_id</label>
            <select name="courses_id" id="" class="form-control">
                @foreach($cou as $co)
                <option value="{{ $co->id }}">{{ $co->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('subjects') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection