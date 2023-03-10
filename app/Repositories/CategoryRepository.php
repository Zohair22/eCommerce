<?php

namespace App\Repositories;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{

    public $getAllCategories;
    private Category $category;
    public function __construct()
    {
        $this->category = new Category();
    }

    public function getAllCategories(): Collection
    {
        return $this->category->latest()->filter(request(['search']))->get();
    }

    public function create($request): Category
    {
        $request['slug'] = str_slug($request['name'].Carbon::now('MM-YYYY'));
        Category::create($request);
        return $this->category->create($request);
    }

    public function update(array $data, Category $category): bool
    {
        return $category->update($data);
    }

    public function delete(Category $category): bool
    {
        return $category->delete();
    }
}
