@extends('layouts.master')
@section('title')
Thêm kết quả
@endsection
@section('content')
<div>
    <h4>Thêm kết quả</h4>
    <form action="{{ route('saveresults') }}" method="post" enctype="multipart/form-data">
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
            @error('avgscore')
                    <div class="text text-danger">{{$message}}</div>
                    @enderror
            <input type="number" class="form-control" 
                 name="avgscore">
                 
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('results') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection