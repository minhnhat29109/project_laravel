@extends('backend.layouts.master');
@section('title')
<title>Thêm thương hiệu</title>
@endsection
@section('content-header')

<!-- Content Header -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Thêm thương hiệu</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                <li class="breadcrumb-item active">Thương hiệu</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

@endsection


@section('content')

<div class="container-fluid">
    <form role="form" method="post" action="{{route('backend.brands.store')}}" style="height: auto">
        @csrf
        <div class="card-body">
          
            <div class="form-group">
                <label for="exampleInputEmail1">Tên thương hiệu</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" id="" placeholder="Tên thương hiệu">
                {{-- @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror --}}
            </div>
        </div>
        <!-- /.card-body -->
    
        <div class="card-footer">
            <a href="{{ route('backend.brands.index') }}" class="btn btn-default">Huỷ bỏ</a>
            <button type="submit" class="btn btn-success">Tạo mới</button>
        </div>
        
       
    </form>

</div><!-- /.container-fluid -->
@endsection