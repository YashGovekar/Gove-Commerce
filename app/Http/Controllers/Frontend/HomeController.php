<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Controller;
use App\Services\BrandService;
use App\Services\CategoryService;
use App\Services\ProductService;
use Inertia\Inertia;

class HomeController extends Controller
{
    private $categorySvc;
    private $brandSvc;
    private $productSvc;

    /**
     * HomeController constructor.
     *
     * @param $categorySvc
     * @param $brandSvc
     * @param $productSvc
     */
    public function __construct(CategoryService $categorySvc, BrandService $brandSvc, ProductService $productSvc)
    {
        $this->categorySvc = $categorySvc;
        $this->brandSvc = $brandSvc;
        $this->productSvc = $productSvc;
    }

    public function index()
    {
        $categories = $this->categorySvc->getAll();
        $brands = $this->brandSvc->getAll();
        $products = $this->productSvc->getAll();
        return Inertia::render('Index/Index', [
            'categories'  => $categories,
            'brands'      => $brands,
            'allProducts' => $products,
        ]);
    }
}
