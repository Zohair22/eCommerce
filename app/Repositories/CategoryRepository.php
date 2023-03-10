<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{

    private Category $category;
    public function __construct()
    {
        $this->category = new Category();
    }

    public function getAllCategories(): Collection
    {
        return $this->category->latest()->filter(request(['search']))->get();
    }
}
