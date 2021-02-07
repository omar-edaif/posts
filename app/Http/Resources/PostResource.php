<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "Category_id"=>$this->Category_id,
            "title"=>$this->title,
            "post_text"=>$this->post_text,
            "created_at"=>$this->created_at->toDateString(),
        ];
    }
}
