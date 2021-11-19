<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function listprofile($id){
        $profile = Students::find($id);
        $list = User::find($id);
        return view('thongtin.profile',compact('list','profile'));
    }
    public function savelistprofile(Request $request ,$id){
        $profile = Students::find($id);
        $list = User::find($id);
        $list->fillable($request->all());
        $list->save();
        $item = [
            'name' => $request->fullname,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'email' => $request->email,
        ];
        DB::table('students')->where('email',$list->email)->update($item);
        return redirect(route('listprofile',['id'=>$id]));

    }
}
