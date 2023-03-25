<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{

    private Product $products;
    public function __construct()
    {
        $this->products = new Product();
    }

    public function getOneProduct(Product $product)
    {
        return Product::where('slug', $product->slug)->first() ;
    }


    public function store($request)
    {
        return Product::create($request)->category()->first();
    }


    public function update(Product $product, $request)
    {
        $product = $this->getOneProduct($product);
        return $product->update($request);
    }

    public function delete($product)
    {
        $product = $this->getOneProduct($product);
        return $product->delete();
    }

    public function search($search)
    {
        return $this->products->where('name', 'like', "%$search%")->get();
    }

    public function searchByCategory($search, $category)
    {
        return $this->products->where('category', $category)->where('name', 'like', "%$search%")->get();
    }
}
