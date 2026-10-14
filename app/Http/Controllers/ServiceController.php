<?php

namespace App\Http\Controllers;

use App\Helpers\Notify;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use App\Traits\ImageTrait;

class ServiceController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.all', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
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
        Notify::success('Service created successfully.');
        return to_route('services.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        $service->load('images');

        // dd(compact('service'));
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
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
        noty()->success('Service updated successfully');
        return to_route('services.index');
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
        noty()->success('Service deleted successfully');
        return to_route('services.index');
    }
}
