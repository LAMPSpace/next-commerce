<?php

namespace App\Http\Resources\Brand;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
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
            'discount_id' => $this->discount_id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->logo,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'address' => $this->address,
            'status' => $this->status
        ];
    }
}
