<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function views()
    {
        return $this->morphMany(View::class, 'viewable');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

//    public function order()
//    {
//        return $this->belongsTo(Order::class);
//    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
