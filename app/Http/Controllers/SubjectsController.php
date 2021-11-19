<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Results;
use App\Models\Subjects;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectsController extends Controller
{
    public function list(){
        $list = Subjects::all();
        return view('subjects.list',compact('list'));
    }
    public function addsubjects(){
        $getAdd= new Subjects();
        $cou = Courses::all();
        return view('subjects.add',compact('getAdd','cou'));
    }
    public function savesubjects(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3|unique:Subjects,name',
        ],
        [
            'name.required'=>'Tên không được để trống',
            'name.min'=>'Tên phải lón hơn 3 kí tự',
            'name.unique'=>'Tên đã tồn tại',

        ]
    );
        $postAdd = new Subjects();
        $postAdd->name = $request->name;
        $postAdd->courses_id = $request->courses_id;
        $postAdd->save();
        Alert::success('Tạo thành công');
        return redirect(route('subjects'));
    }
    public function deletesubjects($id){
        $dele = Subjects::find($id);
        if(!empty($dele)){
            $dele->delete();
            Results::where('subjects_id',$id)->delete();
        }
        $dele->delete();
        Alert::alert('Đã xóa thành công');
        return redirect(route('subjects'));
    }
    public function editsubjects($id){
        $getEdit = Subjects::find($id);
        $cou = Courses::all();
        return view('subjects.edit',compact('getEdit','cou','id'));
    }
    public function saveEdit(Request $require, $id){
        $postEdit = Subjects::find($id);
        $postEdit->name = $require->name;
        $postEdit->courses_id = $require->courses_id;
        $postEdit->save();
        Alert::success('Sửa thành công');
        return redirect(route('subjects'));

    }
}
