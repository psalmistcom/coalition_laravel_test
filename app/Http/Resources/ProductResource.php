<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'total' => $this->total,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
