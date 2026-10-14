<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('view product');

        $products = Product::get();

        return ApiResponse::response(ProductResource::collection($products), 'Products retrieved successfully', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        Gate::authorize('create product');

        $data = $request->validated();

        $product = Product::create($data);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {

                $path = $this->uploadImage($image, 'products');

                $product->images()->create([
                    'path' => $path,
                ]);
            }
        }

        return ApiResponse::response(new ProductResource($product), 'Product created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        Gate::authorize('view product');

        return ApiResponse::response(new ProductResource($product), 'Product retrieved successfully', 200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        Gate::authorize('edit product');
        $product->update($request->validated());

        // Delete selected images
        if ($request->filled('delete_images')) {
            foreach ($request->delete_images as $imageId) {
                $image = $product->images()->find($imageId);

                if ($image) {
                    $this->deleteImage($image->path);
                    $image->delete();
                }
            }
        }

        // Upload new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $this->uploadImage($file, 'products');

                $product->images()->create([
                    'path' => $path,
                ]);
            }
        }

        return ApiResponse::response(new ProductResource($product), 'Product updated successfully', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Gate::authorize('delete product');

        foreach ($product->images as $image) {

            $this->deleteImage($image->path);

            $image->delete();
        }

        $product->delete();

        return ApiResponse::response(null, 'Product deleted successfully', 200);
    }
}
