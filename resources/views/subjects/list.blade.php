@extends('layouts.master')
@section('title')
List Subject
@endsection
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên môn học</th>
            <th>Khoa</th>
            <th>    <a href="add-subjects" class="btn btn-outline-light"> <img src="{{asset('backend/icon/plus.png')}}" alt=""></a>
</th>
        </tr>
    </thead>
    <tbody>
        @foreach($list as $key => $su)
        <tr>
            <td>{{$su->id}}</td>
            <td>{{$su->name}}</td>
            <td>{{$su->courses->name}}</td>
            <td>
                <form action="delete-subjects/{{$su->id}}" method="POST">
                    @csrf
                    <a href="edit-subjects/{{$su->id}}" class="btn btn-outline-success"><img
                            src="{{asset('backend/icon/edit.png')}}" alt=""></a>
                    <button   type="submit" class="btn btn-outline-danger">
                        <img src="{{asset('backend/icon/bin.png')}}" alt="">
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
