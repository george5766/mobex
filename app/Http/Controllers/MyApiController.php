<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProductM;
use DB;


class MyApiController extends Controller
{
    public function index()
    {
        $data = User::get();
     return response()->json($data);
    }

    public function r_ad(Request $request)
    {
        $token = $request->token;
        $page = (int)$request->paginationCount / 10;
        
        $data=DB::table('product_m_s')->orderBy('product_no')->cursorPaginate(2);

        return response()->json($data, 200);
    }

    public function r_offers(Request $request)
    {
        $token = $request->token;
        $page = (int)$request->paginationCount / 10;
        
        $data=DB::select('select * from follows f join product_m_s p join stores s join rates r on f.store_no = p.store_no and f.store_no = s.store_no and p.product_no = r.product_no where offer > ?' , [0]);
        
        return response()->json($data, 200);
    }

    
    public function new_product(Request $request)
    {

        $data=DB::select('select * from follows f join product_m_s p join stores s join rates r on f.store_no = p.store_no and f.store_no = s.store_no and p.product_no = r.product_no');
        return response()->json($data, 200);
    }
    
    public function products(Request $request)
    {
        $data=DB::select('select * from product_m_s where product_category = ?' , [$request->category]);
        return response()->json($data, 200);
    }

    






}

