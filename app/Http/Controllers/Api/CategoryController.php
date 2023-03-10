<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
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
}
