<div>
    <h4>Edit Subject</h4>
    <form id ="registerSubmit" action="#" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name Student</label>
            <input type="text" class="form-control" name="name" value="{{$getEdit->name}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Ngày sinh</label>
            <input type="date" class="form-control" name="birthday" value="{{$getEdit->birthday}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="number" class="form-control" name="phone" value="{{$getEdit->phone}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name="email" value="{{$getEdit->email}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Courses_id</label>
            <select class="form-control" name="courses_id" id="">
                @foreach($cou as $co)
                <option value="{{$co->id}}">{{$co->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="1" @if ($getEdit->status == 1){{ "selected" }} @endif>Đã học xong</option>
                        <option value="2" @if ($getEdit->status == 2){{ "selected" }} @endif>Chưa học xong</option>
                    </select>
                </div>
        <button id="update-student"  class="btn btn-primary">Submit</button>
        <a href="{{ route('students') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
<script>
    $('body').on('click', '#update-student', function(event) {
        
            event.preventDefault();
            $.ajax({
                type: "post",
                url: "{{ route('ajaxstudentupdate') }}",
                data: {data: $("#registerSubmit").serialize(),id:"{{$id}}","_token": "{{ csrf_token() }}"},
                success: function (data) {
                    if (data.status == true) {
                        
                        $('#infor').html(data.html);
                        $('#myModal').modal('show');
                    } else {
                        // toastr.error(data.message);
                    }
                },
            });
            
            });
</script>