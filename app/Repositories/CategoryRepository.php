<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryRepository
{
    public function getAllCategories(): Collection
    {
        return Category::all();
    }
}
