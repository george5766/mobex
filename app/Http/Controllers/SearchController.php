<?php

namespace App\Http\Controllers;
use \App\Models\ProductM;  
use \App\Models\Store;
use \App\Models\User;   
use Illuminate\Http\Request;
use DB;
class SearchController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $follows = DB::select('SELECT * FROM follows WHERE user_name = ?' , [auth()->user()->user_name] );
        $count = count($follows);
        $follows = DB::select('SELECT * FROM follows WHERE user_name = ?' , [auth()->user()->user_name] );
        $followers_count = count($follows);
        $store =Store::class;
        $rate = DB::select('select rate , product_name from rates r join product_m_s p on r.product_no = p.product_no');        
        $order_item= DB::select('select * from tempords r join product_m_s p join stores s on r.product_no = p.product_no and p.store_no = s.store_no');
       
        $orders_count = count($order_item);
        // my orders
        $myorders = DB::select('select * from order_items oi  join product_m_s p join stores s join orders o on oi.product_no = oi.product_no and p.store_no = s.store_no and o.order_no = oi.order_no and o.user_name = ?' , [auth()->user()->user_name]);
        $myorders_count = count($myorders);
        $result = null;
        return view('search',[
            'results' =>$result,
            'followers' =>$follows,
            'count' => $count,
            'follows' =>$follows,
            'followers_count' => $followers_count,
            'store'=>$store,
            'emp' =>0,
            'rates'=>$rate,
            'order_items'=>$order_item,
            'order_count'=>$orders_count,
            'myorders'=> $myorders,
            'myorders_count'=>$myorders_count,
            ]);
    }

    public function result(Request $request)
    {
        
        $search=$request->search;
        $by=$request->By;
    
        if($by == 'name')
        $result = DB::select('select * from product_m_s where product_name = ?', [$search]);
        elseif($by == 'category')
        $result = DB::select('select * from product_m_s where product_category = ?', [$search]);
        else
        $result = DB::select('select * from product_m_s where product_price <= ?', [$search]);
        $follows = DB::select('SELECT * FROM follows WHERE user_name = ?' , [auth()->user()->user_name] );
        $followers_count = count($follows);
        $store =Store::class;
        $rate = DB::select('select rate , product_name from rates r join product_m_s p on r.product_no = p.product_no');        
        $order_item= DB::select('select * from tempords r join product_m_s p join stores s on r.product_no = p.product_no and p.store_no = s.store_no');
       
        $orders_count = count($order_item);
        // my orders
        $myorders = DB::select('select * from order_items oi  join product_m_s p join stores s join orders o on oi.product_no = oi.product_no and p.store_no = s.store_no and o.order_no = oi.order_no and o.user_name = ?' , [auth()->user()->user_name]);
        $myorders_count = count($myorders); 
        $store =Store::class;
        return view('search',[
            'results'=>$result,
            'followers'=>$follows,
            'followers_count' => $followers_count,
            'store'=>$store,
            'emp' =>0,
            'rates'=>$rate,
            'order_items'=>$order_item,
            'order_count'=>$orders_count,
            'myorders'=> $myorders,
            'myorders_count'=>$myorders_count,
            ]);
    }
}
