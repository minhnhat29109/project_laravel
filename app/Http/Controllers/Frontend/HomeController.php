<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $request->session()->put('user_login', 'Nhat');
        // session(['test', 'DM Nhat']);
        // dd($request->session()->get('user_login'));

        // $request->session()->put('user_id', 'Nhat');

        // dd($request->session()->get('user_id'));

        // $cart = [
        //     '1'=>[
        //         'id' =>1,
        //         'name' => 'iphone',
        //         'price' => '500000',
        //     ]
        //     ];
        // // session(['cart' => $cart]);
        //     if($request->session()->has('cart')){
        //         $product = [
        //             'id' =>1,
        //             'name' => 'iphone',
        //             'price' => '500000',
        //         ];
        //         $cart[2] = $product;
        //     session(['cart'=> $cart]);
        //     }
        // dd($request->session()->get('cart'));

        // Storage::disk('local')->put('file.txt', 'Contents');
        // Storage::put('file1.txt', 'Nhat');

        // Storage::disk('local_1')->put('file.txt', 'Contents');
        // Storage::disk('public')->put('file.txt', 'Contents');
        // Storage::disk('public')->put('file1.txt', 'Contents');
        // $disk = Storage::disk('local');
        // $path = 'file10.txt';
        // if ($disk->exists($disk)) {
        //     $content = $disk->get($path);
        //     dd($content);
        // }else {
        //     dd('file khong ton tai');
        // }
        // Cookie::queue('user_name', 'DM Nhat', 1);
        // dd($request->cookie('user_name'));

        //CACHE

        
    
        $categories = Category::where('parent_id', 0)->get();
        $products = Product::orderBy('id', 'desc')->get();
        return view('frontend.home')->with(compact('products'))->with(compact('categories'));
    }

    
    public function getCategoryMenu(){
        $categories = Category::all();
        return view('frontend.includes.navbar', with($categories));
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
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('frontend.home.product-detail', ['product' => $product]);
    }

    function getSearchAjax(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = Product::where('name', 'LIKE', "{$query}%")
            ->get();
            $output = '<ul class="dropdown-menu" style="display:block">';
            foreach($data as $row)
            {
               $output .= '
               <li><a href="'.route('frontend.home.product-detail',$row->slug).'">'.$row->name.'</a></li>
               ';
           }
           $output .= '</ul>';
           echo $output;
       }
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
