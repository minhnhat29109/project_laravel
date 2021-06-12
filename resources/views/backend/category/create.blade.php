@extends('backend.layouts.master');
@section('title')
<title>Danh sách danh mực</title>
@endsection
@section('content-header')

<!-- Content Header -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tạo danh mục</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                <li class="breadcrumb-item active">Tạo danh mục</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

@endsection


@section('content')

<div class="container-fluid">
    <form role="form" method="post" action="{{ route('backend.category.store') }}" style="height: auto">
        @csrf
        <div class="card-body">
          
            <div class="form-group">
                <label for="exampleInputEmail1">Tên danh mục</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" id="" placeholder="Tên danh mục">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Chọn danh mục cha (Nếu có)</label>
                <select name="category_id" value="{{old('category_id')}}" class="form-control select2" style="width: 100%;">
                    <option value="0">--Chọn danh mục---</option>
                    
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- /.card-body -->
    
        <div class="card-footer">
            <a href="{{ route('backend.products.index') }}" class="btn btn-default">Huỷ bỏ</a>
            <button type="submit" class="btn btn-success">Tạo mới</button>
        </div>
        
       
    </form>

</div><!-- /.container-fluid -->
@endsection