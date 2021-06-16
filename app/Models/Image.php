<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    protected $table = "images";
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function getImageUrlAttribute()
    {
        return url(Storage::url($this->path));
    }
    
}
