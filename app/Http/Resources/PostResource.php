<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'title_ar' => $this->title_ar,
            'content' => $this->content,
            'content_ar' => $this->content_ar,
            'user' => $this->user->name,
            'categories' => $this->categories->pluck('name'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
