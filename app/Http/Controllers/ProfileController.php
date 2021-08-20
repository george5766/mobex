<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\ProductM;  
use \App\Models\Store;
use DB;   
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(User $user)
    {
        if($user->id != auth()->user()->id){
            return 'you cant access this profile';
        }
        $myprofile= $user->store;
        if($myprofile ==null){
            return redirect('/make_store/'.$user->id );
        }

        $latest = DB::select('select * from product_m_s where store_no =' . $user->store->store_no .' ORDER BY created_at DESC' );
        $offer = DB::select('select * from product_m_s where offer>0 And store_no ='. $user->store->store_no);

        $products = DB::select('select * from product_m_s where store_no =' . $user->store->store_no);
        $chunks= array_chunk($latest,3);
        $follows = DB::select('SELECT * FROM follows WHERE user_name = ?' , [auth()->user()->user_name] );
        $store =Store::class;
        $rate = DB::select('select rate , product_name from rates r join product_m_s p on r.product_no = p.product_no');        
        $followers_count  = count($follows);
        $order_item= DB::select('select * from tempords r join product_m_s p join stores s on r.product_no = p.product_no and p.store_no = s.store_no');
       
        $orders_count = count($order_item);
        // my orders
        $myorders = DB::select('select * from order_items oi  join product_m_s p join stores s join orders o on oi.product_no = oi.product_no and p.store_no = s.store_no and o.order_no = oi.order_no and o.user_name = ?' , [auth()->user()->user_name]);
        $myorders_count = count($myorders);

        return view('profile' , [
            'user' => $user, 
            'latests'=>$chunks,
            'offers' =>$offer,
            'products' => $products,
            'followers' =>$follows,
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
