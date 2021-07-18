@extends('backend.layouts.master')
@section('content')
    {{-- <form action="{{route('backend.order.chart')}}" method="get">
        @csrf
        <div class="container">
            <div class="row">
                <div class="form-group">
                    <label for="">Từ ngày: </label>
                    <input type="date">
                    <label for="">Đến ngày: </label>
                    <input type="date">
                    <button class="btn"><i class="fas fa-filter"></i></button>
                </div>
            </div>
        </div>
    </form> --}}
    <div>
        <figure class="container-fluid">
            <div id="container" class=""></div>
            <p class="highcharts-description">
            </p>
        </figure>
    </div>
@endsection