<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Cloner\Data;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Cart::content();
        if (Auth::check()) {
            $info = User::find(Auth::user()->id)->userInfo; 
        }else {
            $info = '';
        }
        return view('frontend.cart', compact('items', 'info'));
        
    }

    public function add(Request $request, $id)
    {
        // dd(Cart::content());
        $color = $request->get('color');
        $size = $request->get('size');
        $product = Product::find($id);
        
        if (count($product->images) > 0) {
            $image = $product->images[0]->path;
        }else {
            $image = '';
        }
        Cart::add($product->id, $product->name, 1, $product->sale_price, 0,[
            'image' => $image,
            'size' => $size,
            'color' => $color,
        ]);
        return redirect()->back()->with('success', 'Dã thêm vào giỏ hàng');
    }
    public function remove($cart_id)
    {
        Cart::remove($cart_id);
        return redirect()->route('frontend.cart.index');
    }
    public function destroyCart()
    {
        Cart::destroy();
        return redirect()->route('frontend.home');
    }

    public function increase($rowId)
    {
        $cart = Cart::get($rowId);
        Cart::update($rowId, $cart->qty + 1);
        return redirect()->back();
    }

    public function decrease($rowId)
    {
        $cart = Cart::get($rowId);
        Cart::update($rowId, $cart->qty - 1);
        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
