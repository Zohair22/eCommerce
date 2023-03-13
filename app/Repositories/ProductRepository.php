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

    public function store()
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
        $request['slug'] = str_slug($request['name'],'','');
        if (isset($request['image']))
        {
            $request['image'] = request('image')->store(('images'));
        }
        $request['user_id'] = auth()->user()->id;

        return Product::create($request)->category()->first();
    }

    public function update($id, $data)
    {
        return $this->products->update($id, $data);
    }

    public function delete($product)
    {
        $product = $product->where('slug', $product->slug)->first();
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
