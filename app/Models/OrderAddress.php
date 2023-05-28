<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderAddress extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function order()
    {
        return $this->hasOne(Order::class, 'address_id');
    }

}
