<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function chart() 
    {
        $data = DB::table('orders')
        ->select('customer_name', DB::raw('sum(total) as total'), DB::raw('DATE(updated_at) as date'))
        ->groupBy('date')
        ->get();
        // dd($data);

        return response()->json(['data' => $data]);

    }

    public function viewChart() {
        return view('chart');
    }
}
