<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Support\Collection;

class CategoryService
{
    private $categoryRepo;

    /**
     * CategoryService constructor.
     *
     * @param $categoryRepo
     */
    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function getAll(): Collection
    {
        return $this->categoryRepo->getAllCategories();
    }
}
