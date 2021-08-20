<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class dashController extends Controller
{
    public function index()
    {   
        $emp = DB::select('select * from employee where user_name = ?' , [auth()->user()->user_name]);
        $users=DB::table('users')->orderBy('id')->where('user_name' , '!=' , 'admin')->simplePaginate(6);
        return view('dashboard',[
            'emp' =>1,
            'users'=>$users,
        ]);
        
    }
}
