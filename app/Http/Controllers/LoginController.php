<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Product;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('myadmin.index',compact('products'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'explan' => 'required',
            'price' => 'required'
        ]);

        $product = new Product();
        $name = $request->name;
        $explan = $request->explan;
        $price = $request->price;

        $product->name = $name;
        $product->text = $explan;
        $product->price = $price;
        $product->save();
        return redirect(route('myadmin.show'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Login $login)
    {
        return view('myadmin.store');
    }

    public function list()
    {
        $products = Product::all();
        return view('myadmin.list',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('myadmin.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $product = Product::find($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->text = $request->explan;

        $product->save();
        return redirect(route('myadmin.index'));
    }

    /**
     * Remove the specified resource from storage.
     */

    public function login(Request $request)
    {
        if($request->password == 'Raillink321') {
            session()->flush();
            $request->session()->put('pas','gaohgreujsdkvaoierjadhaiueohvcauyeoih');
        }
        return redirect(route('myadmin.index'));
    }

    public function logout()
    {
        session()->flush();
        return redirect(route('myadmin.index'));
    }
}
