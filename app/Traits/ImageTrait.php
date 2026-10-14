<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait ImageTrait
{
    public function uploadImage($file, $folder)
    {
        return $file->store($folder, 'public');
    }

    public function deleteImage(?string $path) : void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    public function updateImage($file, $folder, ?string $oldPath) : string
    {
        $this->deleteImage($oldPath);
        return $this->uploadImage($file, $folder);
    }
}
