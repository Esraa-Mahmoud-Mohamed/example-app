<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::with('images')->get();
        return ApiResponse::response(ServiceResource::collection($services), 'Services retrieved successfully', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $data = $request->validated();

        $service = Service::create($data);
        $path = $this->uploadImage($request->file('image'), 'services');
        $service->images()->create([
            'path' => $path
        ]);
        return ApiResponse::response(new ServiceResource($service), 'Service created successfully', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        $service->load('images');
        return ApiResponse::response(new ServiceResource($service), 'Service retrieved successfully', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $data = $request->validated();
        // dd($data);
        $service->update($data);
        if ($request->hasFile('image')) {
            $oldImage = $service->images()->first();
            if ($oldImage) {
                $newPath = $this->updateImage($request->file('image'), 'services', $oldImage->path);
                $oldImage->update([
                    'path' => $newPath
                ]);
            } else {
                $newPath = $this->uploadImage($request->file('image'), 'services');

                $service->images()->create([
                    'path' => $newPath
                ]);
            }
        }
        return ApiResponse::response(new ServiceResource($service), 'Service updated successfully', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if ($service->images()->exists()) {

            $image = $service->images()->first();
            $this->deleteImage($image->path);
            $image->delete();
        }
        $service->delete();
        return ApiResponse::response(null, 'Service deleted successfully', 200);
    }
}
