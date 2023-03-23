<?php

namespace App\Repositories;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

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

    public function create(): Category
    {
        $request = request()->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories'],
            'slug' => ['unique:categories'],
            'description' => ['required', 'string'],
            'created_at' => [''],
            'updated_at' => [''],
        ]);
        $request['created_at'] = Carbon::now();
        $request['updated_at'] = Carbon::now();
        $request['slug'] = str_slug($request['name'],'','');
        return Category::create($request);
    }


    public function update(Category $category)
    {
        $category = Category::where('slug', $category['slug'])->first();
        $request = request()->validate([
            'name' => 'required|string|max:255|'. Rule::unique('categories')->ignore
                ($category->id),
            'slug' => 'required|string|max:255|'. Rule::unique('categories')->ignore
                ($category->id),
            'description' => 'required|string',
        ]);
        $request['slug'] = str_slug($request['name']);
        $category->update($request);
        return $request['name'];
    }

    public function delete(Category $category)
    {
        $category = Category::where('slug', $category['slug'])->first();
        return $category->delete();
    }
}
