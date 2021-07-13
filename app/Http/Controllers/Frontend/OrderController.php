<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(StoreOrderRequest $request)
    {
        $items = Cart::content();
        $order = new Order();

        if (Auth::check()) {
            $order->user_id = Auth::user()->id;
            $order->total = 10000000;   
            $order->note = $request->get('note');
            $order->customer_name = $request->get('name');
            $order->phone = $request->get('phone');
            $order->address = $request->get('address');
            $order->status = Order::WAIT;
            $order->email = $request->get('mail');
            $order->save();
        }else {
            $order->total = 10000000;
            $order->note = $request->get('note');
            $order->customer_name = $request->get('name');
            $order->phone = $request->get('phone');
            $order->address = $request->get('address');
            $order->status = Order::WAIT;
            $order->email = $request->get('mail');
            $order->save();
        }
        foreach($items as $item)
        {
            if (!$item->options->color) {
                $color = '';
            }else{
                $color = $item->options->color;
            }
            if (!$item->options->size) {
                $size = '';
            }else {
                $size = $item->options->size;
            }
            $order->products()->attach($item->id, [
                'quantity' => $item->qty,
                'color' => $item->color,
                'size' => $item->size,
                'price' => $item->price,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        Cart::destroy();
        return redirect()->route('frontend.home')->with('success','Đặt hàng thành công!');
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
        //
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
