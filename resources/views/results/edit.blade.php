@extends('layouts.master')
@section('title')
Sửa kết quả
@endsection
@section('content')
<div>
    <h4>Sửa kết quả</h4>
    <form action="{{ route('save-edit-results',['id'=>$id]) }}" method="post" enctype="multipart/form-data">
    @csrf
        
        <div class="form-group">
            <label for="exampleInputEmail1"> Sinh viên</label>
            <select name="students_id" id="" class="form-control">
                @foreach($stu as $st)
                <option value="{{ $st->id }}">{{ $st->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Môn học</label>
            <select name="subjects_id" id="" class="form-control">
                @foreach($sub as $su)
                <option value="{{ $su->id }}">{{ $su->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Điểm trung bình</label>
            <input type="number" class="form-control" 
                 name="avgscore" value="{{$getEdit->avgscore}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('results') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection