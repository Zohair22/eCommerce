<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{

    private Category $category;
    public function __construct()
    {
        $this->category = new Category();
    }

    public function getAllCategories()
    {
        return $this->category->latest()->filter(request(['search']))->paginate(5)->withQueryString();
    }

    public function getOneCategory($slug)
    {
        return $this->category->where('slug', $slug)->first();
    }


    public function create($request): Category
    {
        return Category::create($request);
    }


    public function update(Category $category, $request)
    {
        $category = $this->getOneCategory($category['slug']);
        return $category->update($request);
    }

    public function delete(Category $category)
    {
        $category = $this->getOneCategory($category['slug']);
        return $category->delete();
    }
}
