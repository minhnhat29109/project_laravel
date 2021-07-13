<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Brands;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('backend.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $slug = \Illuminate\Support\Str::slug($request->get('name')).'-'.rand(1000, 9999);
        $query = Brand::insert(['name' => $name, 'slug' => $slug]);
        if ($query) {
            return redirect()->route('backend.brands.index')->with('success','Thêm thương hiệu thành công');
        }else {
            return redirect()->route('backend.brands.index')->with('error','Thêm thương hiệu thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $brand = Brand::where('slug', $slug)->first();
        return view('backend.brands.update', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $name = $request->get('name');
        $query = Brand::where('slug', $slug)->update(['name' => $name]);
        if ($query) {
            return redirect()->route('backend.brands.index')->with('success','Cập nhật thương hiệu thành công');
        }else {
            return redirect()->route('backend.brands.index')->with('error','Cập nhập thương hiệu thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Brand::where('id', $id)->delete();
         Product::where('brand_id', $id)->update(['brand_id' => 0]);
        if ($query) {
            return redirect()->route('backend.brands.index')->with('success','Xóa thành công');
        }
        return redirect()->route('backend.brands.index')->with('error','Xóa thất bại');
    }
}
