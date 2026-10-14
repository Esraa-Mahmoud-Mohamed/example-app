<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Helpers\Notify;
use App\Traits\ImageTrait;
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

        return view('admin.products.all', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create product');

        return view('admin.products.create');
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

        Notify::success('Product created successfully.');

        return to_route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        Gate::authorize('view product');

        $product->load('images');

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        Gate::authorize('edit product');

        $product->load('images');

        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        Gate::authorize('edit product');
        // dd($request->validated());
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

        Notify::success('Product updated successfully.');

        return to_route('products.index');
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

        Notify::success('Product deleted successfully.');

        return to_route('products.index');
    }
}
