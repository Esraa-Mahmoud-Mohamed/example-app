<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Http\Resources\TestimonialResource;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('view testimonial');
        $testimonials = Testimonial::all();
        return ApiResponse::response(TestimonialResource::collection($testimonials), 'Testimonials retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestimonialRequest $request)
    {
        Gate::authorize('create testimonial');
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $testimonial = Testimonial::create($data);
        return ApiResponse::response(new TestimonialResource($testimonial), 'Testimonial created successfully', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        Gate::authorize('view testimonial');
        return ApiResponse::response(new TestimonialResource($testimonial), 'Testimonial retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        Gate::authorize('edit testimonial');
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $testimonial->update($data);
        return ApiResponse::response(new TestimonialResource($testimonial), 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        Gate::authorize('delete testimonial');
        $testimonial->delete();
        return ApiResponse::response(null, 'Testimonial deleted successfully.', 200);
    }
}
