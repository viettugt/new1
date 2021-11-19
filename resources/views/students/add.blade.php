@extends('layouts.master')
@section('title')
Add stuents
@endsection
@section('content')
<div>
    <h4>Add students</h4>
    <form action="{{ route('savestudents') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name students</label>
            @error('name')
            <div class="text text-danger">{{$message}}</div>
            @enderror
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Ngày sinh</label>
            @error('birthday')
            <div class="text text-danger">{{$message}}</div>
            @enderror
            <input type="date" class="form-control" name="birthday">
        </div>
        <div class="form-group">
            <label for="">Phone</label>
            @error('phone')
            <div class="text text-danger">{{$message}}</div>
            @enderror
            <input type="number" class="form-control" name="phone">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            @error('email')
            <div class="text text-danger">{{$message}}</div>
            @enderror
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Course_id</label>
            <select name="courses_id" id="" class="form-control">
                @foreach($cou as $co)
                <option value="{{ $co->id }}">{{ $co->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="1">Đã học xong</option>
                        <option value="2">Chưa học xong</option>
                    </select>
                </div>
                <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
<br>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('course') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
@endsection