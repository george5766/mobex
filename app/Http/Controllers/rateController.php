<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Rate;

class rateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => ['required', 'string'],
            'product_no' => ['required', 'string'],
            'rate' => ['required', 'integer'],
        ]);
    }
    protected function create(Request $request)
    {   
        
        $r = 2;
        if($request->rating != null)
            $r = $request->rating;
         Rate::create([
            'user_name' => $request->user_name,
            'product_no'=> $request->product_no,
            'rate' => $r,
        ]);
        return redirect('home');
    }
}
