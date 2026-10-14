<?php

namespace App\Services;

use App\Models\Post;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Auth;

class PostService
{
    use ImageTrait;
    public function createPost(array $data, $images)
    {
        $data['user_id'] = Auth::id();

        $post = Post::create($data);

        // if ($data->hasFile('images')) {

        foreach ($images as $image) {

            $path = $this->uploadImage($image, 'posts');

            $post->images()->create([
                'path' => $path
            ]);
        }
        // }

        $post->categories()->attach($data['categories']);

        return $post;
    }

    public function updatePost(Post $post, array $data, $images)
    {
        if (array_key_exists('categories', $data)) {
            $post->categories()->sync($data['categories']);
        }
        $data['user_id'] = Auth::id();
        $post->update($data);
        // if ($data->hasFile('image')) {
        if ($images) {
            $oldImage = $post->images()->first();
            if ($oldImage) {
                $newPath = $this->updateImage($images, 'posts', $oldImage->path);

                $oldImage->update([
                    'path' => $newPath
                ]);
            } else {
                $newPath = $this->uploadImage($images, 'posts');

                $post->images()->create([
                    'path' => $newPath
                ]);
            }
        }

        // $path = $request->file('image')->store('users', 'public');
        // if ($user->images()->exists()) {
        //     $user->images()->update([
        //         'path' => $path
        //     ]);
        // } else {
        //     $user->images()->create([
        //         'path' => $path
        //     ]);
        // }
        // }

        return $post;
    }

    public function deletePost(Post $post)
    {
        foreach ($post->images as $image) {

            $this->deleteImage($image->path);

            $image->delete();
        }
        $post->delete();
    }
}
