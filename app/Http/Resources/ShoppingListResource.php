<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShoppingListResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'created_at' => $this->created_at?->utc()->format('Y-m-d\TH:i:s\Z'),
            'updated_at' => $this->updated_at?->utc()->format('Y-m-d\TH:i:s\Z'),
            'items' => ItemResource::collection($this->whenLoaded('items')),
            '_links' => [
                'self' => ['href' => route('list.show'), 'method' => 'GET'],
                'add_item' => ['href' => route('items.store'), 'method' => 'POST'],
            ],
        ];
    }
}
