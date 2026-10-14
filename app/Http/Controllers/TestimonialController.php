<?php

namespace App\Http\Controllers;

use App\Helpers\Notify;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
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
        return view('admin.testimonials.all', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create testimonial');
        
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestimonialRequest $request)
    {
        Gate::authorize('create testimonial');
        $data = $request->validated();
        // dd($data);
        $data['user_id'] = Auth::id();
        Testimonial::create($data);
        Notify::success('Testimonial created successfully.');
        return to_route('testimonials.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        Gate::authorize('view testimonial');
        return view('admin.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        Gate::authorize('edit testimonial');
        return view('admin.testimonials.edit', compact('testimonial'));
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
        Notify::success('Testimonial updated successfully.');
        return to_route('testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        Gate::authorize('delete testimonial');

        $testimonial->delete();
        Notify::success('Testimonial deleted successfully.');
        return to_route('testimonials.index');
    }
}
