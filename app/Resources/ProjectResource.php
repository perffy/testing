<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'todo' => TodoResource::collection($this->whenLoaded('todos')),
        ];
    }
}
