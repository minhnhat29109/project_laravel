<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        $categories = Category::where('parent_id', 0)->get();
        $products = Product::orderBy('id', 'desc')->get();
        return view('frontend.layouts.master')->with(compact('products'))->with(compact('categories'));
        // return view('welcome');
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
