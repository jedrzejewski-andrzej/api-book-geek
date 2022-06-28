<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'isbn' => $this->isbn,
            'authors' => AuthorResource::collection($this->whenLoaded('authors')),
            'category' => CategoryResource::make($this->whenLoaded('category')),
            'prize' => CategoryResource::make($this->whenLoaded('prize')),
        ];
    }
}
