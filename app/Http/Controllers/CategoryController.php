<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
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
    public function store(): RedirectResponse
    {
        $request = request()->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories'],
            'slug' => ['unique:categories'],
            'description' => ['required', 'string'],
            'created_at' => [''],
            'updated_at' => [''],
        ]);
        $request['slug'] = str_slug($request['name'],'','');
        $this->categoryRepository->create($request);
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
        $category = Category::where('slug', $category['slug'])->first();
        return Inertia::render('Category/Edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Category $category): RedirectResponse
    {
        $request = request()->validate([
            'name' => 'required|string|max:255|'. Rule::unique('categories')->ignore
                ($category->id),
            'slug' => 'required|string|max:255|'. Rule::unique('categories')->ignore
                ($category->id),
            'description' => 'required|string',
        ]);
        $request['slug'] = str_slug($request['name']);
        $this->categoryRepository->update($category, $request);
        return redirect('/?search='.$category)->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $this->categoryRepository->delete($category);
        return redirect()->route('dashboard')->with('success', 'Category deleted successfully');
    }
}
