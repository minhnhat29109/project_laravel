@extends('backend.layouts.master');
@section('title')
<title>Update-Product</title>
@endsection

@section('content-header')

<!-- Content Header -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tạo sản phẩm</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                <li class="breadcrumb-item active">Sủa sản phẩm</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

@endsection

@section('content')
<div class="container-fluid">
    <form role="form" method="post" action="{{ route('backend.products.update', $product->id ) }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          
            <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="text" name="name" value="{{$product->name}}" class="form-control" id="" placeholder="Điền tên sản phẩm">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Danh mục sản phẩm</label>
                <select name="category_id" class="form-control select2" style="width: 100%;">
                    <option value="-1}"><-- Chọn danh mục --></option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Giá gốc</label>
                        <input type="text" name="origin_price" value="{{$product->origin_price}}" class="form-control" placeholder="Điền giá gốc">
                        @error('origin_price')
                            <p class="text-danger">{{ $message }}</p>
                         @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Giá bán</label>
                        <input type="text" name="sale_price" value="{{$product->sale_price}}" class="form-control" placeholder="Điền giá bán">

                        @error('sale_price')
                             <<p class="text-danger">{{ $message }}</p>
                         @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                <textarea class="textarea" name="content" value="{{old('content')}}" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!!$product->content!!}</textarea>
                          @error('content')
                            <p class="text-danger">{{ $message }}</p>
                         @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="images[]" multiple> 
                    </div>
                </div>
                @if (count($product->images) > 0)
                    @foreach ($product->images as $images)
                        <img src="{{$images->image_url}}" style="width: 60px" alt="">
                    @endforeach
                @endif
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Trạng thái sản phẩm</label>
                <select name="status" class="form-control select2" style="width: 100%;">
                        @foreach (\App\Models\Product::$status_text as $key => $value )
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                </select>
                @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <!-- /.card-body -->
    
        <div class="card-footer">
            <a href="{{ route('backend.products.index') }}" class="btn btn-default">Huỷ bỏ</a>
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </div>
        
       
    </form>



    
@endsection