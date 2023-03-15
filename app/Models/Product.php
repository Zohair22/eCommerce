<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getImageAttribute($image): string
    {
        if (isset($image)){
            return asset('storage/'.$image);
        }
        return asset('storage/images/default.jpg');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
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

}
