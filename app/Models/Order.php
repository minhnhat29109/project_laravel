<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    const CANCER = -1;
    const WAIT = 0;
    const CONFIRM = 1;
    const TRANSPORT = 2;
    const SUCCESS = 3;
    public static $status_order = [
        -1 => 'Đã hủy',
        0 => 'Chờ xác nhận',
        1 => 'Đã xác nhận',
        2 => 'Đang vận chuyển',
        3 => 'Đã nhận hàng', 
    ];
    public static $status_color = [
        -1 => 'bg-danger',
        0 => 'Chờ xác nhận',
        1 => 'Đã xác nhận',
        2 => 'Đang vận chuyển',
        3 => 'Đã nhận hàng', 
    ];
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot(['price', 'quantity','size', 'color']);;
    }
    public function orderproducts(){
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }
    public function getStatusOrderAttribute()
    {
            return self::$status_order[$this->status];

    }
}
