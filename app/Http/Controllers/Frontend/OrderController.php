<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;
use Svg\Tag\Rect;

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
        // dd((int)Cart::total());
        if (Auth::check()) {
            $order->user_id = Auth::user()->id;
            $order->total = (int)Cart::total(); 
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
        $order = Order::find($id);
        $products = $order->orderproducts;
        foreach ($products as $product) {
            $id = $product->product_id;
            $name[] = Product::find($id)->name;
        }
        return view('frontend.order_detail', compact('order', 'name'));
    }
    public function list($id)
    {
        $orders = Order::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return view('frontend.orders', compact('orders'));
    }
    public function cancer($id){
        Order::where('id', $id)->update(['status' => Order::CANCER]); 
        return redirect()->back()->with('success', 'Hủy đơn hàng thành công');
    }
    public function reviewProduct(Request $request, $id){
        // try {
            $review = new Review();
            $order = Order::find($id);
            Order::where('id', $id)->update(['review_status' => Order::REVIEW_STATUS]);
            $product_id = $order->orderproducts;
            foreach ($product_id as $id){
                $review->user_id = Auth::user()->id;
                $review->product_id = $id->id;
                $review->content = $request->get('content');
                $request->rating = $request->get('star');
                $review->save();
                return redirect()->back()->with('success', 'Đánh giá thành công');
            }

        // } catch (\Throwable $th) {
        //     abort(404);
        // }
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
