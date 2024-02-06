<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);

        return[
            'id'=>$this->id,
            'title'=>$this->title,
            'body'=>$this->body
        ];
    }

    public function with($request){
        return[
            'version'=>'1.0.0',
            'author_url'=>url('http://www.kyaw.com/@ad333')
        ];
    }
}
