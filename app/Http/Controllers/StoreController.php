<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Store;
use \App\Models\User;
use \App\Models\ProductM;
use DB;


class StoreController extends Controller
{
   /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

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
        $follows = DB::select('SELECT * FROM follows WHERE user_name = ?' , [auth()->user()->user_name] );
        $store =Store::class;
        $rate = DB::select('select rate , product_name from rates r join product_m_s p on r.product_no = p.product_no');        
        $followers_count  = count($follows);
        $product =  DB::select('select * from product_m_s');

        $order_item= DB::select('select * from tempords r join product_m_s p join stores s on r.product_no = p.product_no and p.store_no = s.store_no where r.u_name = ?' , [auth()->user()->user_name]);
        $orders_count = count($order_item);
        $orders_count = count($order_item);
        // my orders
        $myorders = DB::select('select * from order_items oi  join product_m_s p join stores s on oi.product_no = oi.product_no and p.store_no = s.store_no and s.user_name = ?' ,[auth()->user()->user_name]);
        $myorders_count = count($myorders);
        $store =Store::class;

        return view('make_store' ,[
            'followers' =>$follows,
            'followers_count' => $followers_count,
            'store'=>$store,
            'emp' =>0,
            'rates'=>$rate,
            'order_items'=>$order_item,
            'order_count'=>$orders_count,
            'products'=> $product,
            'myorders'=> $myorders,
            'myorders_count'=>$myorders_count,
            'store'=>$store,
            ]);
    }

    public function store_show($id)
     {

        $user= User::find($id);
        $offer = DB::select('select * from product_m_s where offer>0 And store_no ='. $user->store->store_no );
            $products = DB::select('select * from product_m_s where store_no =' . $user->store->store_no);        
        $latest = DB::select('select * from product_m_s where store_no =' . $user->store->store_no .' ORDER BY created_at DESC');
        $store = $user->store;
        $chunks= array_chunk($latest,3);
        $follow = DB::select('select * from follows where store_no = ' . $user->store->store_no );
        $follows = DB::select('SELECT * FROM follows WHERE user_name = ?' , [auth()->user()->user_name] );
        $followers_count = count($follows);
        $order_item= DB::select('select * from tempords r join product_m_s p join stores s on r.product_no = p.product_no and p.store_no = s.store_no');
       
        $orders_count = count($order_item);
        // my orders
        $myorders = DB::select('select * from order_items oi  join product_m_s p join stores s on oi.product_no = oi.product_no and p.store_no = s.store_no and s.user_name = ?' ,[auth()->user()->user_name]);
        $myorders_count = count($myorders);
        return view('store',[
             'id' => $id,
             'offers' =>$offer,
             'products' => $products,
             'latests'=>$chunks,
             'store' =>$store,
            'follow'=>$follow,
            'followers' =>$follows,
            'followers_count' => $followers_count,
            'emp' =>0,
            'order_items'=>$order_item,
            'order_count'=>$orders_count,            'myorders'=> $myorders,
            'myorders_count'=>$myorders_count,
                
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
            'store_name' => ['required', 'string', 'max:255'],
            'store_bio' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create($store,Request $request)
    {
        $name = User::find($store)->user_name;
        return Store::create([
            'store_no' => $store,
            'user_name'=> $name,
            'store_name' => $request['store_name'],
            'store_bio' => $request['store_bio'],

        ]);     
    }
}
