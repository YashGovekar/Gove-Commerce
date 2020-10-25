<?php

namespace App\Services;

use App\Repositories\BrandRepository;
use Illuminate\Support\Collection;

class BrandService
{
    private $brandRepo;

    /**
     * BrandService constructor.
     *
     * @param $brandRepo
     */
    public function __construct(BrandRepository $brandRepo)
    {
        $this->brandRepo = $brandRepo;
    }

    public function getAll(): Collection
    {
        return $this->brandRepo->getAllBrands();
    }
}
