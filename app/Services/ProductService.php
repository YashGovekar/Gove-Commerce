<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductImage;
use App\Repositories\ProductRepository;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Log;

class ProductService
{
    /**
     * @var ProductRepository
     */
    private $productRepo;

    /**
     * ProductService constructor.
     *
     * @param ProductRepository $productRepo
     */
    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function getAll() :Collection
    {
        return $this->productRepo->getAllProducts();
    }

    public function get(int $id) :array
    {
        $product = Product::find($id);
        $product['images'] = $product->images;
        return $product;
    }

    public function storeImage(UploadedFile $file): string
    {
        return $file->storePublicly('products/images');
    }

    public function store(array $array): bool
    {
        $product = Product::create($array);

        $images = $array['images'];
        if ($images) {
            foreach ($images as $image) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image'      => $image,
                ]);
            }
        }
        return true;
    }

    public function update(int $id, array $array): bool
    {
        $product = Product::find($id);
        $product->update($array);
        return true;
    }

    public function destroy(int $id): bool
    {
        $product = Product::find($id);
        try {
            $product->delete();
            return true;
        } catch (Exception $e) {
            Log::error('Product Delete Failed!');
            return false;
        }
    }
}
