<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Laravelcrud extends Controller
{
    function index(){
        $data=array(
          'datas'=>DB::table('crud')->get()
        );
        return view('crud.index',$data);
    }
    function add(Request $request){

        $request->validate([
           'names'=>'required',
            'age'=>'required',
            'email'=>'required|email|unique:crud'
        ]);
        $query=DB::table('crud')->insert([
            'names'=>$request->input('names'),
            'age'=>$request->input('age'),
            'email'=>$request->input('email'),
        ]);
        if($query){
            return back()->with('success','ثبت شد');
        }else{
            return back()->with('fail','مشکلی پیش آمده');
        }
    }
    function edit($id){

        $row =DB::table('crud')
            ->where('id',$id)
            ->first();

        $data = [
            'Info'=>$row,
            'Title'=>'ویرایش'
            ];
        return view('crud.edit',$data);
    }
    function update(Request $request){
        $request->validate([
            'names'=>'required',
            'age'=>'required',
            'email'=>'required|email'
        ]);

        $updateing=DB::table('crud')
            ->where('id',$request->input('cid'))
            ->update([
            'names'=>$request->input('names'),
            'age'=>$request->input('age'),
                'email'=>$request->input('email')
            ]);
        return redirect('crud');
    }
    function delete($id){
    $dalete =DB::table('crud')
        ->where('id',$id)
        ->delete();
    return redirect('crud');
    }
}
