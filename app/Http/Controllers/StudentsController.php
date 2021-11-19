<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Results;
use App\Models\Students;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    public function list(){
        $list1 = Students::all();
        return view('students.list',compact('list1'));
    }
    public function addstudents(){
        $getAdd =  Students::all();
        $cou = Courses::all();
        return view('students.add',compact('getAdd','cou'));
    }
    public function saveAdd(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3|unique:Students,name',   
            'birthday'=>'required|numeric|min:0',  
            'phone'=>'required|min:9|numeric|min:0',  
            'email'=>'required|min:3|unique:Students,name',   

        ],
        [
            'name.required'=>'Tên không được để trống',                    
            'name.min'=>'Tên phải lón hơn 3 kí tự',
            'name.unique'=>'Tên đã tồn tại',
            'birthday.required'=>'ngày sinh không được để trống',
            'birthday.unique'=>'ngày sinh đã tồn tại',
            'phone.required'=>'Số điện thoại không được để trống',                    
            'phone.unique'=>'Số điện thoại đã tồn tại',   
            'email.required'=>'Eamil không được để trống', 
            'email.unique'=>'Eamil đã tồn tại',





        ]
    );
        $postAdd = new Students();
        $postAdd->name = $request->name;
        $postAdd->birthday = $request->birthday;
        $postAdd->phone = $request->phone;
        $postAdd->email = $request->email;
        $postAdd->courses_id = $request->courses_id;
        $postAdd->status = $request->status;
        $postAdd->password = $request->password;
        $postAdd->save();
        $item = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        DB::table('users')->insert($item);
        Alert::success('Tạo thành công');
        return redirect(route('students'));
    }
    public function deletestudents($id){
        $dele = Students::find($id);
        if(!empty($dele)){
            //delete course
            $dele->delete();
            // delete subject where courses_id = $id
            Results::where('students_id',$id)->delete();

        }
        $dele->delete();
        Alert::alert('Đã xóa thành công');
        return redirect(route('students'));

    }
    public function editstudents($id){
        $getEdit= Students::find($id);
        $cou= Courses::all();
        return view('students.edit',compact('getEdit','id','cou'));
    }
    public function saveEdit(Request $request,$id){
        
        $postEdit = Students::find($id);
        $postEdit->name = $request->name;
        $postEdit->birthday = $request->birthday;
        $postEdit->phone = $request->phone;
        $postEdit->email= $request->email;
        $postEdit->courses_id = $request->courses_id;
        $postEdit->status = $request->status;
        Alert::success('Sửa thành công');
        $postEdit->save();
        
        return redirect(route('students'));
    }
    public function search(Request $request){
        $output = '';
        $students = Students::Where('birthday','LIKE','%'.$request->keyword.'%')->get();
        foreach($students as $re){
            $output .='
            <tr>
                <td>'.$re->id.'</td>
                <td>'.$re->name.'</td>
                <td>'.$re->birthday.'</td>
                <td>'.$re->phone.'</td>
                <td>'.$re->email.'</td>
                <td>'.$re->courses_id.'</td>
                
                <td>
                <form action="'."deletestudents/{$re->id}".'" method="POST">
                    <a onclick="onclink()" href="'."edit-students/{$re->id}".'" class="btn btn-outline-success">
                    <img
                            src="'."backend/icon/edit.png".'" alt=""></a>
                    <button type="submit" class="btn btn-outline-danger">
                        <img src="'."backend/icon/bin.png".'" alt="">
                    </button>
                </form>
                </td>
             </tr>';
        }
        return response()->json($output) ;
        
    }
    public function ajaxStudent(Request $request){
        $id = $request->id;
     
        $getEdit= Students::find($id);
        $cou= Courses::all();
        $html = view('students.ajax_edit',compact('getEdit','id','cou'))->render();

        return response()->json([
            'status' => true,
            'html' => $html,
            'message' => 'Coupon code applied successfully.',
        ]);
        
 
    }
    public function ajaxstudentupdate(Request $request){
        
        $id = $request->id;
        $params = array();
        parse_str($request->data, $params);
        dd($params);
        $getEdit= Students::find($id);
        $cou= Courses::all();
        $html= view('students.ajaxstudentupdate',compact('getEdit','id','cou'))->render();

        return response()->json([
            'status' => true,
            'html' => $html,
            'message' => 'Coupon code applied successfully.',
        ]);

    }
}