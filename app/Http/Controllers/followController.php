<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Follow;
use DB;

class followController extends Controller
{


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => ['required', 'string'],
            'store_name' => ['required', 'string'],
        ]);
    }
    protected function create(Request $request)
    {
        Follow::create([
            'store_no' => $request->store_no,
            'user_name'=> $request->user_name,
        ]);
        return redirect('/store/'.$request->store_no);
    }

    protected function delete(Request $request)
    {


        DB::delete('delete from follows where user_name = ? and store_no = ?', [$request->user_name,$request->store_no]);
        return redirect('/home');
    }
}
