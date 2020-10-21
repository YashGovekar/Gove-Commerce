<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Controller;
use App\Services\ProductService;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    private $productSvc;

    /**
     * ProductController constructor.
     *
     * @param ProductService $productSvc
     */
    public function __construct(ProductService $productSvc)
    {
        $this->productSvc = $productSvc;
    }

    public function index(): Response
    {
        $products = $this->productSvc->getAll();
        return Inertia::render('Products/Index', [
            'products' => $products,
        ]);
    }

    public function show($id): Response
    {
        $product = $this->productSvc->get($id);
        return Inertia::render('Products/Product', [
            'product' => $product,
        ]);
    }
}
