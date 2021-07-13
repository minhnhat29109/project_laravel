<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";

    const STATUS_INT = 0;
    const STATUS_BUY = 1; 
    const STATUS_STOP = -1;
    const FILLTER_1 = [0 , 1000000];
    const FILLTER_2 = [1000000, 2000000];
    const FILLTER_3 = [];
    public static $status_color = [
        0 => 'bg-warning',
        1 => 'bg-success',
        -1 => 'bg-danger',
    ];

    public static $status_text = [
        0 => 'Đang nhập',
        1 => 'Đang bán',
        -1 => 'Dừng bán',
    ];

    const NO_CATEGORY = [
        NULL => 'Không có danh mục',
    ];

    protected $fillable = ['name', 'slug', 'origin_price', 'sale_price', 'content', 'user_id', 'status'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function orders(){
        return $this->belongsToMany(Order::class);
    }
    
    public function images(){
        return $this->hasMany(Image::class);
    }

    public function wares(){
        return $this->hasMany(Ware::class);
    }
    public function getStatusTextAttribute(){
        return self::$status_text[$this->status];
    }
    public function getStatusColorAttribute(){
        return self::$status_color[$this->status];
    }
    
}
