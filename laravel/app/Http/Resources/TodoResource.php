<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
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
            'attributes' => [
                'todo' => $this->todo,
                'is_completed' => (bool) $this->is_completed,
                'created_at' => $this->created_at,
            ],
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ]
        ];
    }
}
