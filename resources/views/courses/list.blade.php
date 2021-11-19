@extends('layouts.master')
@section('title')
Danh sách danh mục
@endsection
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên khoa</th>
            <th>
                <a href="add-courses" class="btn btn-outline-light"> <img src="{{asset('backend/icon/plus.png')}}"
                        alt=""></a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($listco as $key => $co)
        <tr>
            <td>{{$co->id}}</td>
            <td>{{$co->name}}</td>
            <td>
                <form    action="delete-courses/{{$co->id}}" method="POST" >
                    @csrf
                    <a   href="edit-courses/{{$co->id}}" class="  btn btn-outline-success"><img
                            src="{{asset('backend/icon/edit.png')}}" alt=""></a>
                    <button   type="submit" class=" btn btn-outline-danger">
                        <img src="{{asset('backend/icon/bin.png')}}" alt="">
                    </button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection
