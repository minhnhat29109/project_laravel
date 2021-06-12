<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(15);
        return view("backend.category.index", ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("backend.category.create", ['categories' => $categories]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        if ($request->get('category_id') == 0) {
            $categories = new Category();
            $categories->name= $request->get('name');
            $categories->slug = \Illuminate\Support\Str::slug($request->get('name'));
            $categories->save();
            return redirect()->route('backend.category.index');
        }
        else{
            $categories = new Category();
            $categories->name= $request->get('name');
            $categories->slug = \Illuminate\Support\Str::slug($request->get('name'));
            $categories->parent_id = $request->get('category_id');
            $categories->save();
            return redirect()->route('backend.category.index');
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
        $categories = Category::all();
        $category = Category::where('id', $id)->first();   
        return view('backend.category.update', ['category' => $category, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        // dd($request->get('category_id'));
        if ($request->get('category_id') == 0) {
            $name = $request->get('name');
            $parent_id = 0;
            $slug = \Illuminate\Support\Str::slug($request->get('name'));
            Category::where('id', $id)->update(['name'=> $name, 'slug' => $slug, 'parent_id' => 0]);
            return redirect()->route('backend.category.index');
        }else{
            $name = $request->get('name');
            $slug = \Illuminate\Support\Str::slug($request->get('name'));
            $parent_id = $request->get('category_id');
            Category::where('id', $id)->update(['name'=> $name, 'slug' => $slug, 'parent_id' => $parent_id]);
            return redirect()->route('backend.category.index');
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
        Category::where('id', $id)->delete();
        return redirect()->route('backend.category.index');
    }
}
