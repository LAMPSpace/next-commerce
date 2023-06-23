<?php

namespace App\Http\Resources\HomeSetting;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeSettingResource extends JsonResource
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
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'background_image' => $this->background_image,
            'color' => $this->color,
            'background_color' => $this->background_color,
            'banner' => json_decode($this->banner),
            'content' => json_decode($this->content),
        ];
    }
}
