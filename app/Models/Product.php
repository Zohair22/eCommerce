<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getImageAttribute($image): string
    {
        if (isset($image)){
            return asset('storage/'.$image);
        }
        return asset('storage/images/1sxw8AD2rsmiXZu3cQ9nHN3nECzH2FsMrHlR11oC.jpg');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }


}
