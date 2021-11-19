@extends('layouts.master')
@section('title')
Edit Students
@endsection
@section('content')
<div>
    <h4>Edit Subject</h4>
    <form action="{{ route('saveEditsu',['id'=>$id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name Students</label>
            <input type="text" class="form-control" 
             name="name" value="{{$getEdit->name}}">
        </div>
        <select name="courses_id" id="" class="form-control">
        @foreach($cou as $co)
                <option value="{{$co->id}}">{{$co->name}}</option>
                @endforeach
        </select>
        
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('subjects') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection