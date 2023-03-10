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

    public function create(): Category
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255' , 'unique:categories,name'],
            'slug' => ['required', 'string', 'max:255' , 'unique:categories,slug'],
        ]);
        $data['slug'] = str_slug($data['name'].Carbon::now('MM-YYYY'));
        Category::create($data);
        return $this->category->create($data);

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
