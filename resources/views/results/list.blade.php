@extends('layouts.master')
@section('title')
Kết quả
@endsection
@section('content')
<table class="table">
    <label for="keyword">Tìm kiếm</label>
    <div class="input-group">
        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Nhập từ khóa">
    </div>
    <tr>
        <th>ID</th>
        <th>Sinh viên</th>
        <th>Môn học</th>
        <th>Điểm trung bình</th>
        <th><a href="add-results" class="btn btn-outline-light"> <img src="{{asset('backend/icon/plus.png')}}"
                    alt=""></a>
            <thead>
        </th>
    </tr>
    </thead>
    <tbody id="ListResults">
        @foreach($lisst as $key => $re)
        <tr>
            <td>{{$re->id}}</td>
            <td>{{$re->students->name}}</td>
            <td>{{$re->subjects->name}}</td>
            <td>{{$re->avgscore}}</td>

            <td>
                <form  action="delete-results/{{$re->id}}" method="POST">
                    @csrf
                    <a href="{{ route('edit-results',['id' => $re['id']]) }}" class="btn btn-outline-success"><img
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
