<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $products = Product::orderBy('id', 'desc')->paginate(12);   
        $brands = Brand::all();
        return view('frontend.view-all', compact('products', 'brands'));
    }
    
    public function filterProduct(Request $request)
    {
        $brands = Brand::all();

        if ($request->get('price') != -1 && $request->get('brand') != -1) {
            if ($request->get('price') == 1) {
                $results = DB::table('brands')
            ->join('products', 'brands.id', '=', 'products.brand_id')
            ->whereBetween('products.sale_price', [0, 1000000])
            ->where('brands.name', $request->brand)
            ->get();
            return view('frontend.filterProduct', compact('results', 'brands'));
            }
            if ($request->get('price') == 2) {
                $results = DB::table('brands')
            ->join('products', 'brands.id', '=', 'products.brand_id')
            ->whereBetween('products.sale_price', [1000000, 2000000])
            ->where('brands.name', $request->brand)
            ->get();
            return view('frontend.filterProduct', compact('results', 'brands'));
            }
            if ($request->get('price') == 3) {
                $results = DB::table('products')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->whereBetween('products.sale_price', [2000000, 2000000000])
            ->where('brands.name', $request->brand)
            ->get();
            dd($results);
            return view('frontend.filterProduct', compact('results', 'brands'));
            }
        }else {
        return redirect()->route('frontend.product.viewAll');
        }
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
