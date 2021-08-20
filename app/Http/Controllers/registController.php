<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;

class registController extends Controller
{

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('regist',[
            'emp'=>1,
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => ['required', 'string', 'max:255' ,'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:10'],
            'first_name' => ['required', 'string'],
            'middle_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'mother_name' => ['required', 'string'],
            'dateofbirth' => ['required', 'string'],
            'balance' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
         User::create([
            'user_name' => $request->user_name,
            'password' => Hash::make($request->password),
            'city' => $request->city,
            'address' => $request->address,
            'sex' => $request->sex,
            'phone' => $request->phone,
            'first_name' => $request->first_name,
            'middle_name'  => $request->middle_name,
            'last_name' => $request->last_name, 
            'mother_name' => $request->mother_name,
            'dateofbirth' => $request->dateofbirth,
            'balance' => $request->balance,
]);     
return redirect('home');
    }


}
