<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanySettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'logo' => $this->logo ? asset('storage/' . $this->logo) : 'No logo uploaded',
            'favicon' => $this->favicon ? asset('storage/' . $this->favicon) : 'No favicon uploaded',
            'social_media' => [
                'facebook' => $this->facebook,
                'twitter' => $this->twitter,
                'instagram' => $this->instagram,
                'linkedin' => $this->linkedin,
            ],
            'footer_description' => $this->footer_description,
            'copyright' => $this->copyright,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
