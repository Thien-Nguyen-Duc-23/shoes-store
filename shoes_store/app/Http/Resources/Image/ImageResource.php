<?php

namespace App\Http\Resources\Image;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\ShoesImages;

class ImageResource extends JsonResource
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
            "id" => $this->id,
            "shoes_id" => $this->shoes_id,
            "image" => \Storage::disk('public')->exists(ShoesImages::DIRECTORY.'/'.$this->image) ?  \Storage::disk(config('filesystems.public_disk'))->url(ShoesImages::DIRECTORY.'/'.$this->image) : asset('admin_lte/dist/img/default-50x50.gif'),
        ];
    }
}
