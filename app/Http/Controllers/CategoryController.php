<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{

    private CategoryRepository $categoryRepository;

    public function __construct(){
        $this->categoryRepository = new CategoryRepository();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $categories = $this->categoryRepository->getAllCategories();
        $filters = Request::all(['search']);
        return Inertia::render('Dashboard', compact('filters','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Category/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $this->categoryRepository->create();
        return redirect()->route('dashboard')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): Response
    {
        return Inertia::render('Category/Edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Category $category): RedirectResponse
    {
        $this->categoryRepository->update($category);
        return redirect('/?search='.$category->name)->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->categoryRepository->delete($category);
        return redirect()->route('dashboard')->with('success', 'Category deleted successfully');
    }
}
