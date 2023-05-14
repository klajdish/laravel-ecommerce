<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Size extends Model
{
    protected $table = 'size';
    protected $guarded = ['id'];
    use HasFactory;

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

      
}
