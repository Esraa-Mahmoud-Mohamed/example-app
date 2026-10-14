<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function __construct(
        private PostService $postService
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('view post');
        $posts = Post::with('user', 'categories')->get();
        return ApiResponse::response(PostResource::collection($posts), 'Posts retrieved successfully', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        Gate::authorize('create post');

        $post = $this->postService->createPost(
            $request->validated(),
            $request->file('images')
        );

        $post->load([
            'user',
            'images',
            'categories',
        ]);

        return ApiResponse::response(new PostResource($post), 'Post created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        Gate::authorize('view post');

        $post->load([
            'user',
            'images',
            'categories',
        ]);

        return ApiResponse::response(new PostResource($post), 'Post retrieved successfully', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        Gate::authorize('edit post');

        $post = $this->postService->updatePost(
            $post,
            $request->validated(),
            $request->file('image')
        );

        $post->load([
            'user',
            'images',
            'categories',
        ]);

        return ApiResponse::response(new PostResource($post), 'Post updated successfully', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete post');

        $this->postService->deletePost($post);

        return ApiResponse::response(null, 'Post deleted successfully', 200);
    }
}
