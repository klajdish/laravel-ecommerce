<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

}
