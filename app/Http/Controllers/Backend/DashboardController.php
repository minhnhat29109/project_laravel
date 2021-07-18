<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
    //     $user = User::find(1);
    //     // dd($user);
    //     $userInfo = $user->userInfo;
    //  dd($userInfo);

      // $userInfo = UserInfo::find(2);
      // $user = $userInfo->user;
     // dd($user->email);


    //đổi category theo products
    // $product = Product::find(2);
    // $category = Category::find(3);


    //     //them san pham co category =1
    // $category = Category::find(4);
    // $product = $category->products()->create([
    //             'name' => 'san pham create',
    //             'slug' => 'aaa',
    //             'origin_price' => '10000',
    //             'sale_price' => '5000',
    //             'content' => 'Noi dung demo',
    //             'user_id' => 1
    // ]);
    

    // $productSaved = $category->products()->save($product);
    
    // $order = new Order();
    // $order->total = 100000;
    // $order->save();

    // // $product = Product::find(1);
    // // $attrach = $order->products()->attrach([2, 3]);
    // $order_id = 1;
    // $order = Order::find(1);
    // $product_id = 1;
    // $order->products()->attach($product_id);
        // $products = Product::with('orders')->first()->orders;
        // foreach ($products as $product){
        //     dd($product->pivot->get());
        // }
        $users = User::all();
        $products = Product::all();
        $orders = Order::all();
        $total = DB::table('orders')
        ->select(DB::raw('sum(total) as total'),DB::raw("DATE_FORMAT(updated_at, '%d-%m-%Y') new_date"), DB::raw('date(updated_at) as date'))
        ->groupBy('date')->orderBy('date', 'desc')
        ->first();
        return view('backend.dashboard', ['users' => $users, 'products' => $products, 'orders' => $orders, 'total' => $total]);
    }
}