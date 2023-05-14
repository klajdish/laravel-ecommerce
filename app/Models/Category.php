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


    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }


    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function descendants()
    {
        return $this->children()->with('descendants');
    }

    public function scopeWithDescendants($query, $categoryId)
    {
        $category = Category::find($categoryId);
        return $query->where('id', $categoryId)
                     ->orWhereIn('id', $category->descendants->pluck('id'));
    }

    public function getAllDescendants()
    {
        $descendants = collect([]);
        foreach ($this->descendants as $child) {
            $descendants->push($child);
            if ($child->children->isNotEmpty()) {
                $descendants = $descendants->merge($child->getAllDescendants());
            }
        }
        return $descendants;
    }

}
