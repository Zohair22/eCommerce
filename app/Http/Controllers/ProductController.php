<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;
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
        $request = request()->validate([
            'name' => 'required|unique:products,name',
            'slug' => 'unique:products,slug',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'discount' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'user_id' => '',
        ]);
        $request['slug'] = str_slug($request['name']);
        if (isset($request['image']))
        {
            $request['image'] = request('image')->store(('images'));
        }
        $request['user_id'] = auth()->user()->id;

        $category = $this->productRepository->store($request);
        $category = $category->first();
        return redirect('/?search='.$category['name']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): Response
    {
        $product = $this->productRepository->getOneProduct($product);
        return Inertia::render('Product/Show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): Response
    {
        $product = $this->productRepository->getOneProduct($product);
        return Inertia::render('Product/Edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $request = request()->validate([
            'name' => [ 'required', Rule::unique('products')->ignore($product->id) ],
            'slug' => [ Rule::unique('products')->ignore($product->id) ],
            'price' => 'required',
            'description' => 'required',
            'discount' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'user_id' => '',
                request('image') !== $product->image ?? 'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);


        $request['slug'] = str_slug($request['name']);

        if ( !!request('image') && request('image') !== $product->image)
        {
            $request['image'] = request('image')->store(('images'));
        }

        $request['user_id'] = auth()->user()->id;
        $this->productRepository->update($product, $request);
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
