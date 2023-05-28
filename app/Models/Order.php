<?php

namespace App\Models;

use App\Models\User;
use App\Models\Statuses;
use App\Models\OrderItem;
use App\Models\OrderAddress;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function status()
    {
        return $this->belongsTo(Statuses::class);
    }
    public function address()
    {
        return $this->belongsTo(OrderAddress::class, 'address_id');
    }

}
