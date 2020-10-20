<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Controller;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Redirect;
use Session;

class ProductController extends Controller
{
    private $productSvc;

    /**
     * ProductController constructor.
     *
     * @param $productSvc
     */
    public function __construct(ProductService $productSvc)
    {
        $this->productSvc = $productSvc;
    }

    public function index(): Response
    {
        $products = $this->productSvc->getAll();
        return Inertia::render('Products/Admin/Index', [
            'products' => $products,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Products/Admin/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $array = $request->all();

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $path = $this->productSvc->storeImage($image);
                array_push($images, $path);
            }
        } else {
            $images = null;
        }

        $array['images'] = $images;

        $store = $this->productSvc->store($array);

        if ($store) {
            Session::put([
                'message' => 'Product Added Successfully!',
                'alert'   => 'success',
            ]);
        } else {
            Session::put([
                'message' => 'Product Adding failed!',
                'alert'   => 'error',
            ]);
        }
        return Redirect::route('admin.products');
    }

    public function show(int $id): Response
    {
        $product = $this->productSvc->get($id);
        return Inertia::render('Products/Admin/Show', [
            'product' => $product,
        ]);
    }

    public function edit(int $id): Response
    {
        $product = $this->productSvc->get($id);
        return Inertia::render('Products/Admin/Edit', [
            'product' => $product,
        ]);
    }

    public function update(int $id, Request $request): RedirectResponse
    {
        $update = $this->productSvc->update($id, $request->all());
        if ($update) {
            Session::put([
                'message' => 'Product updated successfully!',
                'alert'   => 'success',
            ]);
        } else {
            Session::put([
                'message' => 'Product updated failed!',
                'alert'   => 'error',
            ]);
        }
        return Redirect::route('admin.products');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->productSvc->destroy($id);
        Session::put([
            'message' => 'Product deleted successfully!',
            'alert'   => 'success',
        ]);
        return Redirect::route('admin.products');
    }
}
