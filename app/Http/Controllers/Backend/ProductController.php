<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use App\Models\Ware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product = Category::find($id)->products()->where('status', 1)->get();
        $products = Product::orderBy('id', 'desc')->get();
        return view('backend.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();   
        $brands = Brand::all();
        return view('backend.products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        
    //     $validatedData = $request->validate([
    //     'name'         => 'required|min:10|max:255',
    //     'origin_price' => 'required|numeric',
    //     'sale_price'   => 'required|numeric',
    // ]);
    // $validator = Validator::make($request->all(),
    //         [
    //             'name'         => 'required|min:10|max:255',
    //             'origin_price' => 'required|numeric',
    //             'sale_price'   => 'required|numeric',
    //         ],
    //         [
    //             'required' => ':attribute Không được để trống',
    //             'min' => ':attribute Không được nhỏ hơn :min',
    //             'max' => ':attribute Không được lớn hơn :max'
    //         ],
    //         [
    //             'name' => 'Tên sản phẩm',
    //             'origin_price' => 'Giá gốc',
    //             'sale_price' => 'Giá bán'
    //         ]
    //     );
    //     if ($validator->errors()){
    //         return back()
    //             ->withErrors($validator)
    //             ->withInput();
    //     }
    // if ($validatedData == null) {
    //     return back()->withErrors(['name' => 'Email không đúng']);
    // }
        // if ($request->get('category') == '') {
        //     $_POST['category'] = 0;
        // }
        // if ($request->get('brand') == '') {
        //     $_POST['brand'] = 0;
        // }
            // $data = $request->get('color');
            // dd($data);

        $product = new Product();
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name')).'-MS'.rand(1000, 9999);
        $product->category_id = $request->get('category');
        $product->brand_id = $request->get('brand');
        $product->origin_price = $request->get('origin_price');
        $product->sale_price = $request->get('sale_price');
        $product->content = $request->get('content');
        $product->status = $request->get('status');
        $product->user_id = Auth::user()->id;
        $save = $product->save();
        if ($request->has('color') && $request->has('size') &&$request->has('amount')) {
            $color = $request->get('color');
            $size = $request->get('size');
            $amount = $request->get('amount');
            for($i = 0; $i < count($color); $i++){
                $data = array(
                    'color' => $color[$i],
                    'size' => $size[$i],
                    'amount' => $amount[$i],
                    'product_id' => $product->id,
                );
                Ware::insert($data);
            }
        }
        if ($request->hasFile('images'))
        {
            $disk = 'public';
            $files = $request->file('images');
            foreach ($files as $file) {
                $name = rand(10000000, 99999999).'-'.$file->getClientOriginalName();
                $path = Storage::disk($disk)->putFileAs('images', $file, $name);
                $images = new Image();
                $images->name = $name;
                $images->disk = $disk;
                $images->path = $path;
                $images->product_id = $product->id;
                $images->save();
            }
            
            return redirect()->route('backend.products.index')->with('success','Thêm sản phẩm thành công');
        }else{
            return redirect()->route('backend.products.index')->with('success','Thêm sản phẩm thành công');
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

    public function showImages($id){
        $images = Product::find($id)->images()->paginate(15);
        
        return view('backend.products.showImages',['images' => $images]);
    }

    public function showProducts($id)
    {
        $products = User::find($id)->products;
        return view('backend.products.showProductsByUserID', ['products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::where('id', $id)->first();   
        $this->authorize('update', $product);
        return view('backend.products.update', compact('product', 'categories', 'brands'));   
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
        // $this->authorize('update', User::class);
        if ($request->hasFile('images')) {
            $product = $request->except('_token', 'files', 'images');
            Product::where('id', $id)->update($product);
            $images = Image::where('product_id', $id)->get();
            foreach($images as $image){
                Storage::disk($image->disk)->delete('/'.$image->path);
                Image::where('product_id', $id)->delete();
            }
            $disk = 'public';
            $files = $request->file('images');
            foreach ($files as $file) {
                $name = rand(10000000, 99999999).'-'.$file->getClientOriginalName();
                $path = Storage::disk($disk)->putFileAs('images', $file, $name);
                $images = new Image();
                $images->name = $name;
                $images->disk = $disk;
                $images->path = $path;
                $images->product_id = $id;
                $images->save();
            }
            return redirect()->route('backend.products.index')->with('success','Cập nhật sản phẩm thành công');     
        }else {
            $product = $request->except('_token', 'files', 'images');
            Product::where('id', $id)->update($product,);
            return redirect()->route('backend.products.index')->with('success','Cập nhật sản phẩm thành công');
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
        $this->authorize('update', User::class);
        Product::where('id', $id)->delete();
        $images = Image::where('product_id', $id)->get();
        foreach($images as $image){
            Storage::disk($image->disk)->delete('/'.$image->path);
            Image::where('product_id', $id)->delete();
        }
        Image::where('product_id', $id)->delete();
            return redirect()->route('backend.products.index')->with('success','Xóa thành công');
    }
}
