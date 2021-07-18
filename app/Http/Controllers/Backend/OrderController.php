<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Order;
use App\Models\Product;
use App\Models\Ware;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use GuzzleHttp\Psr7\Message;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('backend.orders.index', compact('orders'));
    }

    public function printer($id)
    {
        $order = Order::find($id);
        $products = $order->orderproducts;
        foreach ($products as $product) {
            $id = $product->product_id;
            $name[] = Product::find($id)->name;
        }
        $pdf = PDF::loadView('backend.orders.printerOrder', compact('order', 'name'));
      
        return $pdf->stream();
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
        try {
            $order = Order::find($id);
            $products = $order->orderproducts;
            foreach ($products as $product) {
            $id = $product->product_id;
            $name[] = Product::find($id)->name;
        }
        return view('backend.orders.order_detail', compact('order', 'name'));
        } catch (\Exception $e) {
            abort(404);
        }
        
    }

    public function updateStatusConfirm($id)
    {
        try {
            $order = Order::find($id);
            // dd($order->email);
            Order::where('id', $id)->update(['status' => Order::CONFIRM]);
            $order_product = $order->orderproducts;
            foreach ($order_product as $product_id) {
                $amount = Ware::where('product_id', $product_id->product_id)->first();
                Ware::where('product_id', $product_id->product_id)->update(['amount' => $amount->amount - 1]);
            }
            foreach ($order_product as $product) {
                $id = $product->product_id;
                $name[] = Product::find($id)->name;
            }
            Mail::to($order->email)->send(new SendMail($order, $name));
            return redirect()->back()->with('success', 'Đơn hàng được xác nhận');
        } catch (\Exception $th) {
            abort(404);
        }
        
    }
    public function updateStatusTranSport($id)
    {
        try {
            Order::where('id', $id)->update(['status' => Order::TRANSPORT]); 
            return redirect()->back()->with('success', 'Đơn hàng đang được vận chuyên');
        } catch (\Throwable $th) {
            abort(404);
        }
    }
    public function updateStatusCancer($id)
    {
        try {
            if (Order::find($id)->status == Order::CONFIRM || Order::find($id)->status == Order::TRANSPORT) {
                $order = Order::find($id);
                Order::where('id', $id)->update(['status' => Order::CANCER]); 
                $order_product = $order->orderproducts;
                foreach ($order_product as $product_id) {
                    $amount = Ware::where('product_id', $product_id->product_id)->first();
                    Ware::where('product_id', $product_id->product_id)->update(['amount' => $amount->amount + 1]);
                }
                return redirect()->back()->with('success', 'Hủy đơn hàng thành công');
            }else {
                Order::where('id', $id)->update(['status' => Order::CANCER]); 
                return redirect()->back()->with('success', 'Hủy đơn hàng thành công');
            }
        } catch (\Throwable $th) {
            abort(404);
        }
        
    }
    public function updateStatusSuccess($id)
    {
        try {
            $status = Order::find($id)->status;
            Order::where('id', $id)->update(['status' => Order::SUCCESS]); 
            return redirect()->back()->with('success', 'Cảm ơn bạn đã mua hàng');
        } catch (\Throwable $th) {
            abort(404);
        }
    }
    public function updateStatusReview($id)
    {
        $status = Order::find($id)->status;
        Order::where('id', $id)->update(['status' => Order::REVIEW_STATUS]); 
        return redirect()->back()->with('success', 'Cảm ơn bạn đã mua hàng');
    }

    public function reviewProduct($id){

    }
    public function chart() 
    {
        $data = DB::table('orders')
        ->select('customer_name', DB::raw('sum(total) as total'),DB::raw("DATE_FORMAT(updated_at, '%d-%m-%Y') new_date"), DB::raw('date(updated_at) as date'))
        ->groupBy('date')->orderBy('date', 'desc')
        ->get();
        return response()->json(['data' => $data]);

    }

    public function viewChart() {
        return view('backend.orders.chart');
       
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
