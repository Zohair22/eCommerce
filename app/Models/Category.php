<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public mixed $name;
    protected $guarded = [];
    protected $with = ['products'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id','id')->latest();
    }

    public function scopeFilter($query, array $filters) : void
    {
        $query->when($filters['search'] ?? false, function ($query, $search)
        {
            return $query->where(
                function ($query) use ($search)
                {
                    return $query
                        ->where('name', 'like', '%'.$search.'%');
                }
            );
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
