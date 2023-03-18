<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    private ProductRepository $productRepository ;

    public function __construct(){
        $this->productRepository = new ProductRepository();
    }

    public function store(): ProductResource
    {
        return new ProductResource($this->productRepository->store());
    }

    public function show(Product $product): ProductResource
    {
        return new ProductResource($this->productRepository->find($product));
    }

    public function edit(Product $product): ProductResource
    {
        return new ProductResource($this->productRepository->find($product));
    }

    public function update(Product $product): ProductResource
    {
        return new ProductResource($this->productRepository->update($product));
    }

    public function destroy(Product $product): ProductResource
    {
        return new ProductResource($this->productRepository->delete($product));
    }
}
