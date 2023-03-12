<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{
    private CategoryRepository $categoryRepository;

    public function __construct(){
        $this->categoryRepository = new CategoryRepository();
    }

    public function index(): CategoryResource
    {
        return new CategoryResource($this->categoryRepository->getAllCategories());
    }

//    public function show(int $id): CategoryResource
//    {
//        return new CategoryResource($this->categoryRepository->getCategoryById($id));
//    }

    public function store(): CategoryResource
    {
        return new CategoryResource($this->categoryRepository->create());
    }

    public function update(Category $category): CategoryResource
    {
        return new CategoryResource($this->categoryRepository->update($category));
    }
}
