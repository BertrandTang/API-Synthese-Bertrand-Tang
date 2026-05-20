<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $itemUrl = route('items.update', $this->resource);

        return [
            'id' => $this->id,
            'name' => $this->name,
            '_links' => [
                'self' => [
                    'href' => $itemUrl,
                    'method' => 'GET',
                ],
                'update' => [
                    'href' => $itemUrl,
                    'method' => 'PUT',
                ],
                'delete' => [
                    'href' => $itemUrl,
                    'method' => 'DELETE',
                ],
                'list' => [
                    'href' => route('list.show'),
                    'method' => 'GET',
                ],
            ],
        ];
    }
}
