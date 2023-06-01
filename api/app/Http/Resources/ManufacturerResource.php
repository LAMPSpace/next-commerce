<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ManufacturerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'uuid' => $this->uuid,
            'discount_uuid' => $this->discount_uuid,
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
