@extends('backend.layouts.master');
@section('title')
<title>Create-Product</title>
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
                <li class="breadcrumb-item active">Tạo sản phẩm</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

@endsection




@section('content')


<div class="container-fluid">
    <form role="form" method="post" action="{{ route('backend.products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          
            <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" id="" placeholder="Điền tên sản phẩm">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Danh mục sản phẩm</label>
                <select name="category_id" value="{{old('category_id')}}" class="form-control select2" style="width: 100%;">
                    <option>--Chọn danh mục---</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Giá gốc</label>
                        <input type="text" name="origin_price" value="{{old('origin_price')}}" class="form-control" placeholder="Điền giá gốc">
                        @error('origin_price')
                            <p class="text-danger">{{ $message }}</p>
                         @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Giá bán</label>
                        <input type="text" name="sale_price" value="{{old('sale_price')}}" class="form-control" placeholder="Điền giá bán">

                        @error('sale_price')
                             <p class="text-danger">{{ $message }}</p>
                         @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                <textarea class="textarea" name="content" value="{{old('content')}}" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                          @error('content')
                            <p class="text-danger">{{ $message }}</p>
                         @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                <div class="input-group">
                    <input type="file" name="images[]" multiple>
                    
                </div>
                @error('images')
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
            <button type="submit" class="btn btn-success">Tạo mới</button>
        </div>
        
       
    </form>



    <!-- Main row -->
    {{-- <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tạo sản phẩm</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('backend.products.create')}}" method="POST">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" id="" placeholder="Điền tên sản phẩm ">
                        </div>
                        <div class="form-group">
                            <label>Danh mục sản phẩm</label>
                            <select class="form-control select2" name="category_id" style="width: 100%;">
                                <option>--Chọn danh mục---</option>
                                <option>Điện thoại</option>
                                <option>Máy tính</option>
                                <option>Máy ảnh</option>
                                <option>Phụ kiện</option>
                            </select>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Giá khuyến mại</label>
                                    <input type="text" name="sale_price" class="form-control" placeholder="Điền giá khuyến mại">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Giá bán</label>
                                    <input type="text" name="origin_price" class="form-control" placeholder="Điền giá gốc">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                            <textarea class="textarea" name="content" placeholder="Place some text here"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái sản phẩm</label>
                            <select class="form-control select2" name="status" style="width: 100%;">
                                <option>--Chọn trạng thái---</option>
                                @foreach (\App\Models\Product::$status_text as $key => $value )
                                 <option value="{{$key}}">{{$value}}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href=""><button type="submit" class="btn btn-default">Huỷ bỏ</button></a>
                        <button type="submit" class="btn btn-sucess">Tạo mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->

@endsection