<?php

namespace App\Repositories;

use App\Models\Brand;
use Illuminate\Support\Collection;

class BrandRepository
{
    public function getAllBrands(): Collection
    {
        $brands = Brand::all();
        foreach ($brands as $brand) {
            $brand['products'] = $brand->products;
        }
        return $brands;
    }
}
