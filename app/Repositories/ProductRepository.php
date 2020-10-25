<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Collection;

class ProductRepository
{
    public function sortProduct($product): object
    {
        $product['images'] = $product->images;
        $product['brand'] = $product->brand;
        $product['category'] = $product->category;
        return $product;
    }

    public function getAllProducts(): Collection
    {
        $products = Product::all();
        foreach ($products as $product) {
            $this->sortProduct($product);
        }
        return $products;
    }

    public function getProduct(int $id): object
    {
        $product = Product::find($id);
        return $this->sortProduct($product);
    }
}
