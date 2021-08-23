<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\ProductM;  
use \App\Models\Store;
use \App\Models\User;    

use DB;   

class HomeController extends Controller
{  /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index( )
    {

        $emps = DB::select('select user_name As user_name from employee where user_name = ?' , [auth()->user()->user_name]);

        $users=DB::table('users')->orderBy('id')->where('user_name' , '!=' , 'admin')->simplePaginate(6);
        //$users = DB::select('select * from users where user_name != ?' , [auth()->user()->user_name]);
        
        $it_product = DB::select('select * from product_m_s where product_category = "it"');
        $ketchen_product = DB::select('select * from product_m_s where product_category = "ketchen"');
        //$it_product = DB::select('select * from product_m_s where product_category = "it"');
        $latest = DB::select('select * from product_m_s ORDER BY created_at DESC');
        $chunks= array_chunk($latest,3);

        $product =  DB::select('select * from product_m_s');
        $follows = DB::select('SELECT * FROM follows WHERE user_name = ?' , [auth()->user()->user_name] );
        $followers_count = count($follows);
        $store =Store::class;
        $rate = DB::select('select rate , product_name from rates r join product_m_s p on r.product_no = p.product_no');        
        $order_item= DB::select('select * from tempords r join product_m_s p join stores s on r.product_no = p.product_no and p.store_no = s.store_no where r.u_name = ?' , [auth()->user()->user_name]);
        $orders_count = count($order_item);

       // dd($it_product);
        // my orders
        $myorders = DB::select('select * from order_items oi join product_m_s p join stores s join orders o on oi.product_no = p.product_no and p.store_no = s.store_no and o.order_no = oi.order_no and o.user_name = ?' , [auth()->user()->user_name]);
        $myorders_count = count($myorders);
        foreach($emps as $emp)
        if($emp->user_name == auth()->user()->user_name)
            return view('dashboard',[
                'emp' =>1,
                'users'=>$users,
                'followers' =>$follows,
                'followers_count' => $followers_count,
                'store'=>$store,
                 'rates'=>$rate,
                'order_items'=>$order_item,
                'order_count'=>$orders_count,
                'myorders'=> $myorders,
                'myorders_count'=>$myorders_count,
                'it_products'=>$it_product,
                'ketchen_products'=>$ketchen_product,
            ]);


        if(auth()->user()->account_status == 'suspended')
            return view('suspended',[
                'emp' =>0,
            ]);
        return view('home')->with([
            'products'=> $product,
            'it_products'=>$it_product,
            'ketchen_products'=>$ketchen_product,
            'latests'=>$chunks,
            'latests1'=>$latest,
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

    public function guest()
    {
        $it_product = DB::select('select * from product_m_s where product_category = "it"');
        $ketchen_product = DB::select('select * from product_m_s where product_category = "ketchen"');
        //$it_product = DB::select('select * from product_m_s where product_category = "it"');
        $store =Store::class;
        $latest = DB::select('select * from product_m_s ORDER BY created_at DESC');
        $product =  DB::select('select * from product_m_s');
        $rate = DB::select('select rate , product_name from rates r join product_m_s p on r.product_no = p.product_no');        
        $order_item= DB::select('select * from tempords r join product_m_s p join stores s on r.product_no = p.product_no and p.store_no = s.store_no');
        $chunks= array_chunk($latest,3);
        $orders_count = count($order_item);





        return view('home')->with([
            'products'=> $product,
            'it_products'=>$it_product,
            'ketchen_products'=>$ketchen_product,
            'latests'=>$chunks,
            'store'=>$store,
            'emp' =>0,            
            'latests1'=>$latest,
            'rates'=>$rate,
            'order_items'=>$order_item,
            'order_count'=>$orders_count,

            ]);
    }


}
