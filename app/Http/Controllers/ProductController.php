<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    private ProductRepository $productRepository;

    public function __construct(){
        $this->productRepository = new ProductRepository();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Product/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $category = $this->productRepository->store();
        $category = $category->first();
        return redirect('/?search='.$category['name']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): Response
    {
        $product = $this->productRepository->find($product);
        return Inertia::render('Product/Show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): Response
    {
        $product = $this->productRepository->find($product);
        return Inertia::render('Product/Edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $this->productRepository->update($product);
        return redirect()->back()->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $category = $product->category()->first();
        $this->productRepository->delete($product);
        return redirect('/?search='. $category['name'])->with('success', 'Product Deleted Successfully');
    }
}
