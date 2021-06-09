<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    protected $table = "users_info";

    protected $fillable = [
        'address',
        'phone',
        'user_id',
    ];


    public function user(){
        return $this->belongsTo(user::class);
    }

    
}
