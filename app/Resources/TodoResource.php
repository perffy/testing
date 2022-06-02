<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'status' => $this->status,
            'views' => $this->views,
            'user' => $this->user ? $this->user->name : null,
        ];
    }
}
