<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";

    // const STATUS_INT = 0;
    // const STATUS_BUY = 1; 
    // const STATUS_STOP = -1;

    public static $status_text = [
        0 => 'Đang nhập',
        1 => 'Đang bán',
        -1 => 'Dừng bán',
    ];



    protected $fillable = ['name', 'slug', 'origin_price', 'sale_price', 'content', 'user_id', 'status'];

    public function category(){
        return $this->belongsTo(Category::class);
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
    public function getStatusTextAttribute(){
        return self::$status_text[$this->status];
    }
}
