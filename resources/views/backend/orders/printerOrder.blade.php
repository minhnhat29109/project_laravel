<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
         {{-- title --}}        
        <!-- Tell the browser to be responsive to screen width -->
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>

        </style>
    </head>
<body>
    <h1>Shoes Shop</h1>
    <h3 style="text-align: center">Hoa don ban hang</h3>
    <p>Ten khach hang: {{$order->customer_name}}</p>
    <p>So dien thoai: {{$order->phone}}</p>
    <p>Email: {{$order->email}}</p>
    <p>Dia chi: {{$order->address}}</p>
    <p>Ngay mua: {{$order->updated_at}}</p>
    <table class="table">      
        <thead>
         

            <tr>
                <th>STT</th>
                <th>Ten san pham</th>
                <th>Gia ban</th>
                <th>Mau</th>
                <th>SIZE</th>
                <th>So luong</th>
                <th>Thanh tien</th>
            </tr>
        </thead>
        <tbody>
            @php
                $stt = 1;
            @endphp
            @forelse ($order->orderproducts as $key=>$product )
            <tr>
                <td>{{$stt++}}</td>
                <td>{{$name[$key]}}</td>
                <td>{{number_format($product->price)}}₫</td>
                <td>{{$product->color}}</td>
                <td>{{$product->size}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{number_format($product->price*$product->quantity)}}₫</td>
            </tr>
            @empty
                
            @endforelse
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Thanh toan:</td>
                <td>{{number_format($order->total)}}₫</td>
            </tr>

        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>