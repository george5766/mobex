<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class addofferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($product_no)
    {
        $follows = DB::select('SELECT * FROM follows WHERE user_name = ?' , [auth()->user()->user_name] );
        $followers_count = count($follows);
        $store =Store::class;
        $rate = DB::select('select rate , product_name from rates r join product_m_s p on r.product_no = p.product_no');        
        $order_item= DB::select('select * from tempords r join product_m_s p join stores s on r.product_no = p.product_no and p.store_no = s.store_no');
        $orders_count = count($order_item);
        $myorders = DB::select('select * from order_items oi  join product_m_s p join stores s join orders o on oi.product_no = oi.product_no and p.store_no = s.store_no and o.order_no = oi.order_no and o.user_name = ?' , [auth()->user()->user_name]);
        $myorders_count = count($myorders);
        return view('add_offer',[
            'followers' =>$follows,
            'followers_count' => $followers_count,
            'store'=>$store,
            'emp' =>0,
            'rates'=>$rate,
            'order_items'=>$order_item,
            'order_count'=>$orders_count,
            'product_no'=>$product_no,
            'myorders'=> $myorders,
            'myorders_count'=>$myorders_count,
        ]);
    }

    public function update($product_no)
    {
    DB::update('update product_m_s set offer = ' . $_REQUEST['offer'] . '  where product_no= '. $product_no);
    return redirect('/profile/' . auth()->user()->id);
    }

    public function delete($product_no)
    {
    DB::update('update product_m_s set offer = ' . 0 . '  where product_no= '. $product_no);
    return redirect('/profile/' . auth()->user()->id);
    }
}
