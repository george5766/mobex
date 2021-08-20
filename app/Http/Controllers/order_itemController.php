<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Tempord;
use \App\Models\Order_item;
use \App\Models\Order;
use DB;

class order_itemController extends Controller
{
    public function index(Request $request)
    {
        $price = (int)$request->price * (int)$request->quantity;


        DB::insert('insert into tempords  (product_no, u_name,price,quantity) values (?, ?,?,?)', [$request->product_no, $request->user_name,$price,$request->quantity]);

        return redirect('home');
    
    }

    public function store(Request $request)
    {
     
        $order_item= DB::select('select * from tempords r join product_m_s p on r.product_no = p.product_no and r.u_name = ?' ,[auth()->user()->user_name]);
        $price = DB::select('select sum(price) As sum from tempords  r join product_m_s p join stores s on r.product_no = p.product_no and p.store_no = s.store_no and r.u_name = ?' ,[auth()->user()->user_name]);

         if ($price[0]->sum < auth()->user()->balance)
         {    
         Order::create([
                  'user_name'=>$order_item[0]->u_name,
             ]);
                    
        $order_no=DB::select('select order_no from orders where user_name = ? ORDER BY order_no DESC limit 1 ', [$order_item[0]->u_name]);
            
        $orders =array_chunk($order_item,1);
         foreach($orders as $order){
             foreach($order as $o){
                DB::insert('insert into order_items (order_no , product_no,price , quantity) values (?, ?,?,?)', [$order_no[0]->order_no, $o->product_no,$o->price,$o->quantity]);
                
            }
         }

        DB::update('UPDATE users SET balance = ? WHERE id = ?', [(int)auth()->user()->balance -$price[0]->sum,auth()->user()->id]);

       foreach($orders as $order){
            foreach($order as $o){
                $store_user = DB::select('select * from users u join stores s  on u.id = s.store_no and s.store_no = ?' , [$o->store_no ]);
                DB::update('UPDATE users SET balance = ? WHERE id = ?', [$store_user[0]->balance + $store_user[0]->over_all_profit,$o->store_no  ]);
                DB::update('UPDATE stores SET over_all_profit = ? WHERE store_no = ?', [$store_user[0]->over_all_profit+$price[0]->sum,$o->store_no  ]);

            }
        }
        DB::delete('DELETE FROM  tempords ');
         }
        else
            return 'you dont have enoph mony';
        
        return redirect('home');

    }
}
