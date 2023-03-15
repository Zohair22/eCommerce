<?php

namespace App\Repositories;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;

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
        $request = request()->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories'],
            'slug' => ['unique:categories'],
            'created_at' => [''],
            'updated_at' => [''],
        ]);
        $request['created_at'] = Carbon::now();
        $request['updated_at'] = Carbon::now();
        $request['slug'] = str_slug($request['name'],'','');
        return Category::create($request);
    }



    public function update(Category $category): bool
    {
        $request = request()->validate([
            'name' => 'required|string|max:255|'. Rule::unique('categories')->ignore
                ($category->id),
            'slug' => 'required|string|max:255|'. Rule::unique('categories')->ignore
                ($category->id),
        ]);
        $request['slug'] = str_slug($request['name']);
        return $category->update($request);
    }

    public function delete(Category $category): bool
    {
        $category = Category::where('name', $category['name'])->first();
        return $category->delete();
    }
}
