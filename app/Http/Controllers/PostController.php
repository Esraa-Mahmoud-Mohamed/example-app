<?php

namespace App\Http\Controllers;

use App\Helpers\Notify;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\PostService;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Gate;
// // use GuzzleHttp\Middleware;
// use Illuminate\Http\Request;
// // use Illuminate\Routing\Controllers\HasMiddleware;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use ImageTrait;

    // public static function middleware() : array
    // {
    //     return [
    //         'auth',
    //         new Middleware('permission:view post',only: ['index', 'show']),
    //         new Middleware('permission:create post' , only: ['create', 'store']),
    //         new Middleware('permission:edit post' , only: ['edit', 'update']),
    //         new Middleware('permission:delete post',only: ['destroy']),
    //     ];

    // }

    public function __construct(private PostService $postService){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('view post');
        $posts = Post::get();
        return view('admin.posts.all', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create post');
        $categories = Category::select('id', 'name')->get();
        return view('admin.posts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        Gate::authorize('create post');


        // $data = $request->validated();
        // $data['user_id'] = Auth::id();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // dd($request->all());

        // $path = $request->file('image')->store('posts', 'public');
        // $post = Post::create($data);
        // foreach ($request->file('images') as $image) {
        //     $path = $image->store('posts', 'public');

        //     // save path to database
        // }
        // $post->images()->create([
        //     'path' => $path
        // ]);
        // dd($request->file('images'));
        // $post = Post::create($data);

        // if ($request->hasFile('images')) {

        //     foreach ($request->file('images') as $image) {

        //         // $path = $image->store('posts', 'public');
        //         $path = $this->uploadImage($image, 'posts');

        //         $post->images()->create([
        //             'path' => $path
        //         ]);
        //     }
        // }
        // $post->categories()->attach($data['categories']);

        $this->postService->createPost($request->validated(), $request->file('images'));
        noty()->success('Post created successfully');
        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        Gate::authorize('view post');
        $post->load(['user', 'images']);
        $post->load('categories');
        $categories = Category::select('id', 'name')->get();
        return view('admin.posts.show', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('edit post');
        $post->load('categories');
        $categories = Category::select('id', 'name')->get();
        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        Gate::authorize('edit post');   
        // // dd($request->all());
        // $data = $request->validated();
        // $post->categories()->sync($data['categories']);
        // $data['user_id'] = Auth::id();
        // $post->update($data);
        // if ($request->hasFile('image')) {
        //     $oldImage = $post->images()->first();
        //     if ($oldImage) {
        //         $newPath = $this->updateImage($request->file('image'), 'posts', $oldImage->path);

        //         $oldImage->update([
        //             'path' => $newPath
        //         ]);
        //     } else {
        //         $newPath = $this->uploadImage($request->file('image'), 'posts');

        //         $post->images()->create([
        //             'path' => $newPath
        //         ]);
        //     }   


        //     // $path = $request->file('image')->store('users', 'public');
        //     // if ($user->images()->exists()) {
        //     //     $user->images()->update([
        //     //         'path' => $path
        //     //     ]);
        //     // } else {
        //     //     $user->images()->create([
        //     //         'path' => $path
        //     //     ]);
        //     // }
        // }
        $this->postService->updatePost($post, $request->validated(), $request->file('image'));
        Notify::success('Post updated successfully');
        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete post');
        // foreach ($post->images as $image) {

        //     $this->deleteImage($image->path);

        //     $image->delete();
        // }
        // $post->delete();
        $this->postService->deletePost($post);
        Notify::success('Post deleted successfully');
        return to_route('posts.index');
    }
}
