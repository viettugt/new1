<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Results;
use App\Models\Students;
use App\Models\Subjects;
use RealRashid\SweetAlert\Facades\Alert;

// Use Alert;
class CourseController extends Controller
{
    public function list(){
        $listco = Courses::all();
        return view('courses.list',compact('listco'));
    }
    /*
    $id is course_id
    */
    public function deletecourses($id){

        $dele= Courses::find($id);
        if(!empty($dele)){
            //delete course
            $dele->delete();
            // delete subject where courses_id = $id
             Subjects::where('courses_id',$id)->delete();
           
            $student = Students::where('courses_id',$id)->pluck('id');
      
            Results::whereIn('students_id',$student)->delete();
        
            Students::where('courses_id',$id)->delete();

        }
        // $alert = new Alert();
        Alert::alert('Đã xóa thành công');
        return redirect(route('courses'));
    }
    public function addcourses(){
        $getAdd = Courses::all();
        return view('courses.add', compact('getAdd'));
    }
    public function savecourses(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3|unique:Courses,name',   
        ],
        [
            'name.required'=>'Tên không được để trống',                    
            'name.min'=>'Tên phải lón hơn 3 kí tự',
            'name.unique'=>'Tên đã tồn tại',

        ]
    );
        $postAdd= new Courses();
        $postAdd->name = $request->name;
        $postAdd->save();
        Alert::success('Tạo thành công');
        return redirect(route('courses'));
    }
    public function editcourses($id){
        $getEdit = Courses::find($id);
        return view('courses.edit',compact('getEdit','id'));
    }
    public function saveEdit(Request $request,$id ){
        $this->validate($request,[
            'name'=>'required|min:3|unique:Courses,name',
        ],
        [
            'name.required'=>'Tên không được để trống',
            'name.min'=>'Tên phải lón hơn 3 kí tự',
            'name.unique'=>'Tên đã tồn tại',
        ]
    );
        $postEdit= Courses::find($id);
        $postEdit->name = $request->name;
        $postEdit->save();
        Alert::success('Sửa thành công');
        return redirect(route('courses'));
    }
}
