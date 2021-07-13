<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('backend.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    #
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
        $order = Order::find($id);
        $products = $order->orderproducts;
        foreach ($products as $product) {
            $id = $product->product_id;
            $name[] = Product::find($id)->name;
        }
        return view('backend.orders.order_detail', compact('order', 'name'));
    }

    public function updateStatusConfirm($id)
    {
        $status = Order::find($id)->status;
        Order::where('id', $id)->update(['status' => Order::CONFIRM]); 
        return redirect()->route('backend.order.index');
    }
    public function updateStatusTranSport($id)
    {
        $status = Order::find($id)->status;
        Order::where('id', $id)->update(['status' => Order::TRANSPORT]); 
        return redirect()->route('backend.order.index');
    }
    public function updateStatusCancer($id)
    {
        $status = Order::find($id)->status;
        Order::where('id', $id)->update(['status' => Order::CANCER]); 
        return redirect()->route('backend.order.index');
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
