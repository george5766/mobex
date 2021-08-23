<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \App\Models\ProductM;
use DB;   
use \App\Models\Store;



class productController extends Controller
{
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
        $order_item= DB::select('select * from tempords r join product_m_s p join stores s on r.product_no = p.product_no and p.store_no = s.store_no');
        $product =  DB::select('select * from product_m_s');
        $products = DB::select('select * from product_m_s where store_no =' . auth()->user()->store->store_no);
       
        $orders_count = count($order_item);
        // my orders
        $myorders = DB::select('select * from order_items oi  join product_m_s p join stores s join orders o on oi.product_no = oi.product_no and p.store_no = s.store_no and o.order_no = oi.order_no and o.user_name = ?' , [auth()->user()->user_name]);
        $myorders_count = count($myorders);

        $store =Store::class;
         return view('add_product',[
            'followers' =>$follows,
            'followers_count' => $followers_count,
            'store'=>$store,
            'emp' =>0,            
            'product' => $product,
            'products'=> $product,
            'rates'=>$rate,
            'order_items'=>$order_item,
            'order_count'=>$orders_count,            'myorders'=> $myorders,
            'myorders_count'=>$myorders_count,

         ]);
        
     }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(\App\Models\ProductM $latest,$store,Request $request)

    {
        $follows = DB::select('SELECT * FROM follows WHERE user_name = ?' , [auth()->user()->user_name] );
        $rate = DB::select('select rate , product_name from rates r join product_m_s p on r.product_no = p.product_no');        
        $followers_count  = count($follows);
        $order_item= DB::select('select * from order_items r join product_m_s p on r.product_no = p.product_no');
        $orders_count = count($order_item);
        
        $path = $request->File('product_image')->store('upload','public');
        $path = 'storage/'.$path;
             \App\Models\ProductM::create([
             'product_name' =>$_REQUEST['product_name'],
             'store_no'=>$store,
             'product_description'=> $_REQUEST['product_description'],
             'offer' =>  $_REQUEST['offer'],
             'product_price' =>  $_REQUEST['product_price'],
             'product_image' => $path,
             'product_category' => $_REQUEST['product_category'],
         ]);     
         return redirect('/profile/' . auth()->user()->id);
    }

    public function delete($product_no)
    {
        DB::delete('delete from product_m_s where product_no = ' .$product_no);
        return redirect('/profile/' . auth()->user()->id);
    }

    protected function edit(\App\Models\ProductM $latest,Request $request,$product_no)

    {
        $follows = DB::select('SELECT * FROM follows WHERE user_name = ?' , [auth()->user()->user_name] );
        $store =Store::class;
        $rate = DB::select('select rate , product_name from rates r join product_m_s p on r.product_no = p.product_no');        
        $followers_count  = count($follows);
        $order_item= DB::select('select * from tempords r join product_m_s p join stores s on r.product_no = p.product_no and p.store_no = s.store_no');
        $orders_count = count($order_item);
        $order_item= DB::select('select * from tempords r join product_m_s p join stores s on r.product_no = p.product_no and p.store_no = s.store_no');
        $orders_count = count($order_item);
        // my orders
        $myorders = DB::select('select * from order_items oi  join product_m_s p join stores s join orders o on oi.product_no = oi.product_no and p.store_no = s.store_no and o.order_no = oi.order_no and o.user_name = ?' , [auth()->user()->user_name]);
        $myorders_count = count($myorders);
        $product = DB::select('select * from product_m_s where product_no = ? limit 1', [$product_no]);

        return view('edit_product',[
            'followers' =>$follows,
            'followers_count' => $followers_count,
            'store'=>$store,
            'emp' =>0,
            'rates'=>$rate,
            'order_items'=>$order_item,
            'order_count'=>$orders_count,
            'myorders'=> $myorders,
            'myorders_count'=>$myorders_count,
            'product'=>$product[0],
        ]);
    }
    public function update_product(Request $request,\App\Models\ProductM $product)
    {

        $store_no = ProductM::find($request->product_no)->store->store_no;

    
        if ($request->has('product_image')) {
            $path = $request->File('product_image')->store('upload','public');
            $path = 'storage/'.$path;
        }

        DB::update('UPDATE `product_m_s` SET `store_no`=?,`product_name`=?,`product_description`=?,`offer`=?,`product_price`=? where product_no = ?', [$store_no,$request->product_name,$request->product_description,$request->offer,$request->product_price,$request->product_no]);
        return redirect('/profile/' . auth()->user()->id);
    }
}
