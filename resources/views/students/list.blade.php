@extends('layouts.master')
@section('title')
List Students
@endsection
@section('content')

<table class="table">
    <div class="row">
        <div class="col">
            <label for="keyword">Tìm kiếm</label>
            <div class="input-group">
                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Nhập từ khóa">
            </div>
        </div>
        <div class="col">
            <label for="keyword">Trang thái</label>
            <div class="input-group">
                <select class="form-control" name="" id="">
                    <option value="">Đã học xong</option>
                    <option value="">Chưa học xong</option>

                </select>
            </div>
        </div>
    </div>
    <thead>
        <tr>
            <th>ID</th>
            <th>Họ và tên</th>
            <th>Sinh ngày</th>
            <th>SDT</th>
            <th>Email</th>
            <th>Khoa</th>
            <th>Trang thái</th>
            <th> <a href="add-students" class="btn btn-outline-light"> <img src="{{asset('backend/icon/add.png')}}"
                        alt=""></a>
            </th>
        </tr>
    </thead>
    <tbody id="ListStudents">
        @foreach($list1 as $key => $st)
        <tr>
            <td>{{$st->id}}</td>
            <td>{{$st->name}}</td>
            <td>{{$st->birthday}}</td>
            <td>{{$st->phone}}</td>
            <td>{{$st->email}}</td>
            <td>{{$st->courses->name}}</td>
            @if($st->status==1)
            <td>Đã học xong</td>
            @elseif($st->status==2)
            <td>Chưa học xong</td>
            @endif
            <td>
            @if(Auth::user()->role_id==1)
                <form action="{{ route('deletestudents',['id' => $st['id']]) }} " method="POST">
                    @csrf
                    <a href="{{ route('edit-students',['id' => $st['id']]) }}" class="btn btn-outline-success">
                        <img src="{{asset('backend/icon/edit.png')}}" alt=""></a>
                        
                        <a href="#" onclick="ajaxEdit({{$st['id']}})" class="btn btn-outline-success">
                        <img src="{{asset('backend/icon/edit.png')}}" alt=""></a>
                        
                    <button type="submit" class="btn btn-outline-danger">
                        <img src="{{asset('backend/icon/bin.png')}}" alt="">
                    </button>
                     
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="container">
    <!-- Trigger the modal with a button -->
    <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><img
            src="{{asset('backend/icon/bin.png')}}" alt=""></button> -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="infor">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
<script>
    // $.ajax({
    //             type: "get",
    //             url: "/lítrrrr",
    //           //  data: {id: id_update, "_token": "{{ csrf_token() }}"},
    //             success: function (data) {
    //                 if (data.status == true) {

                        
    //                     $('#infor').html(data.html);
    //                     $('#myModal').modal('show');
    //                 } else {
    //                     // toastr.error(data.message);
    //                 }
    //             },
    //         });
    function ajaxEdit(id_update){
        $.ajax({
                type: "post",
                url: "{{ route('ajaxstudent') }}",
                data: {id: id_update, "_token": "{{ csrf_token() }}"},
                success: function (data) {
                    if (data.status == true) {
                        
                        $('#infor').html(data.html);
                        $('#myModal').modal('show');
                    } else {
                        // toastr.error(data.message);
                    }
                },
            });
    }
    function ajaxsaveEdit(id_update){
        $.ajax({
                type: "post",
                url: "{{ route('ajaxstudentupdate') }}",
                data: {id: id_update, "_token": "{{ csrf_token() }}"},
                success: function (data) {
                    if (data.status == true) {
                        
                        $('#infor').html(data.html);
                        $('#ListStudents').modal('show');
                    } else {
                        // toastr.error(data.message);
                    }
                },
            });
    }

    
            
</script>