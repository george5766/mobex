<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class EditProfileController extends Controller
{
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
        $follows = DB::select('SELECT * FROM follows WHERE user_name = ?' , [auth()->user()->user_name] );
        $followers_count = count($follows);
        $store =Store::class;
        $rate = DB::select('select rate , product_name from rates r join product_m_s p on r.product_no = p.product_no');        
        $order_item= DB::select('select * from tempords r join product_m_s p join stores s on r.product_no = p.product_no and p.store_no = s.store_no');
        $orders_count = count($order_item);
        $store =Store::class;
        $myorders = DB::select('select * from order_items oi  join product_m_s p join stores s join orders o on oi.product_no = oi.product_no and p.store_no = s.store_no and o.order_no = oi.order_no and o.user_name = ?' , [auth()->user()->user_name]);
        $myorders_count = count($myorders);
        $products = DB::select('select * from product_m_s where store_no =' . auth()->user()->store->store_no);

        return view('EditProfile',[
                'followers' =>$follows,
                'followers_count' => $followers_count,
                'store'=>$store,
                'products' => $products,
                'emp' =>0,
                'rates'=>$rate,
                'order_items'=>$order_item,
                'order_count'=>$orders_count,
                'myorders'=> $myorders,
                'myorders_count'=>$myorders_count,
        ]);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => ['required', 'string', 'max:255' ,'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:10'],
            'profile_image'=>'file|image',

        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function update(Request $request)
    {
        $path = null;
        if($request->hasFile('profile_image')){
        $path = $request->File('profile_image')->store('upload','public');
        $path = 'storage/'.$path;}
        
        $data=[
            'user_name'=>$_REQUEST['user_name'],
            'password' =>Hash::make($_REQUEST['password']),
            'city'=>$_REQUEST['city'],
            'address'=> $_REQUEST['address'],
            'phone' =>  $_REQUEST['phone'],
            'profile_image' => $path,
        ];     
        auth()->user()->update($data);
        return redirect('/profile/' . auth()->user()->id);
    }

    public function delete($user)
    {

        DB::delete('delete from users where id = ' . $user);
        return redirect('/home');       
    }

    
    public function suspend($user)
    {
        DB::update('update users set account_status = ? where id = ?', ['suspended',$user ]);
        return redirect('/home');       
    }

    public function unsuspend($user)
    {
        DB::update('update users set account_status = ? where id = ?', ['activate',$user ]);
        return redirect('/home');       
    }


    
    public function add_mony(Request $request,$user)
    {
        $old_balance =DB::select('select balance from users where id = ?', [$user]);
        
        $new_balance = $old_balance[0]->balance + $request->mony;

        DB::update('update users set balance = ? where id = ?', [$new_balance,$user]);
        
        return redirect('/home');       
    }
}
