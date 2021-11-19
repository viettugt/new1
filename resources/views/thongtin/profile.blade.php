@extends('layouts.master')
@section('title')
Profile
@endsection
@section('content')


<div class="container">
    <div class="row">
        <div class="col-sm-4"><h1>Cập nhật thông tin</h1></div>
        <div class="col-sm-8">
            <form action="{{ route('savelistprofile',['id' =>$list->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Họ tên</label>
                    <input type="name" name="fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$list->students->name}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tài khoản</label>
                    <input type="name" name="name" readonly="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$list->name}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Ngày sinh</label>
                    <input type="date" name="birthday" class="form-control" id="exampleInputPassword1" value="{{$list->students->birthday}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                    <input type="number"name="phone" class="form-control" id="exampleInputPassword1"value="{{$list->students->phone}}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="email"name="email" readonly="" class="form-control" id="exampleInputPassword1" value="{{$list->email}}"> 
                </div>
                <button type="submit" class="btn btn-primary">Lưu thông tin</button>
            </form>
        </div>

    </div>

</div>
@endsection