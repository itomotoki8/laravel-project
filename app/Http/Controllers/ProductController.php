<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->find) {
            $products = Product::where('name','LIKE',"%{$request->find}%")->sortable()->paginate(5);
            return view('products.index',compact('products'));
            return;
        }

        $products = Product::sortable()->paginate(5);
        $data = ['products' => $products];
        return view('products.index',$data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $cookie = Cookie::get('product_id');
        $data = ['product' => $product,'cookie' => $cookie];
        return view('products.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
}
