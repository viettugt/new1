<?php

namespace App\Http\Controllers;

use App\Models\Results;
use App\Models\Students;
use App\Models\Subjects;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ResultsController extends Controller
{
    public function list(){
        $lisst = Results::all();
        return view('results.list',compact('lisst'));
    }
    public function addresults (){
        $stu = Students::all();
        $sub = Subjects::all();
       return view('results.add',compact('stu','sub'));
    }
    public function saveAdd(Request $request){
        $this->validate($request,[
            'avgscore'=>'required|numeric|min:0',
        ],
        [
            'avgscore.require'=>"điểm phải lớn >= 0"
        ]
    );
        $postAdd = new Results();
        $postAdd->students_id = $request->students_id;
        $postAdd->subjects_id = $request->subjects_id;
        $postAdd->avgscore = $request->avgscore;
        $postAdd->save();
        Alert::success('Tạo thành công');
        return redirect(route('results'));

    }
    public function deletere($id){
        $dele = Results::find($id);
        $dele->delete();
        Alert::alert('Đã xóa thành công');
        return redirect(route('results'));

    }
    public function editresults1($id){
        $getEdit = Results::find($id);
        $stu = Students::all();
        $sub = Subjects::all();
        return view('results.edit',compact('getEdit','sub','stu','id'));
    }
    public function saverEdit(Request $request ,$id){
        $posstEdit = Results::find($id);
        $posstEdit->students_id = $request->students_id;
        $posstEdit->subjects_id = $request->subjects_id;
        $posstEdit->avgscore = $request->avgscore;
        $posstEdit->save();
        Alert::success('Sửa thành công');
        return redirect(route('results'));

    }
    public function search_resuls(Request $request){
        $output = '';
        $results = Results::Where('avgscore','LIKE','%'.$request->keyword.'%')->get();
        foreach($results as $re){
            $output .='
            <tr>
                <td>'.$re->id.'</td>
                <td>'.$re->students->name.'</td>
                <td>'.$re->subjects->name.'</td>
                <td>'.$re->avgscore.'</td>
                <td>
                <form action="'."delete-results/{$re->id}".'" method="POST">
                    <a onclick="onclink()" href="'."edit-results/{$re->id}".'" class="btn btn-outline-success">
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
}