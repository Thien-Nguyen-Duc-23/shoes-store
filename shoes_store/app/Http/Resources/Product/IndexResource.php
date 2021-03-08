<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Image\ImageResource;
use App\Models\Shoes;

class IndexResource extends JsonResource
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
            'id' => $this->id,
            'category_id' => $this->category_id,
            'slug' => $this->slug,
            'name' => $this->name,
            'price_cost' => $this->price_cost,
            'price' => $this->price,
            'price_sale' => $this->price_sale,
            'sort_description' => $this->sort_description,
            'long_description' => $this->long_description,
            'status' => $this->status,
            'is_sale' => $this->is_sale,
            'start_date_sale' => $this->start_date_sale,
            'end_date_sale' => $this->end_date_sale,
            'sku' => $this->sku,
            'image' => \Storage::disk('public')->exists(Shoes::DIRECTORY.'/'.$this->image) ?  \Storage::disk(config('filesystems.public_disk'))->url(Shoes::DIRECTORY.'/'.$this->image) : asset('admin_lte/dist/img/default-50x50.gif'),
            'shoes_image' => ImageResource::collection($this->shoesImages)
        ];
    }
}
