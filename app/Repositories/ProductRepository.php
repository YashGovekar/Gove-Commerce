<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Collection;

class ProductRepository
{
    public function sortProduct($product): array
    {
        $product['images'] = $product->images;
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

    public function getProduct(int $id): array
    {
        $product = Product::find($id);
        return $this->sortProduct($product);
    }
}
