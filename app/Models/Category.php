<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Category extends Model
{
    protected $table = 'category';
    protected $guarded = ['id'];
    use HasFactory;

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function parentCategories(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
