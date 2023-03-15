<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Validation\Rule;

class ProductRepository
{

    private Product $products;
    public function __construct()
    {
        $this->products = new Product();
    }

    public function find(Product $product)
    {
        return Product::where('slug', $product->slug)->first();
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
        $request['slug'] = str_slug($request['name']);
        if (isset($request['image']))
        {
            $request['image'] = request('image')->store(('images'));
        }
        $request['user_id'] = auth()->user()->id;

        return Product::create($request)->category()->first();
    }


    public function update(Product $product)
    {
        $product = $this->find($product);
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
        return $product->update($request);
    }

    public function delete($product)
    {
        $product = $this->find($product);
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
