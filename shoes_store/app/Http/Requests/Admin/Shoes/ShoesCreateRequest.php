<?php

namespace App\Http\Requests\Admin\Shoes;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ShoesCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  =>  'required|max:255',
            'sku'   =>  'required|max:255|unique:shoes,sku,'.$this->id,
            'category_id'   =>  'required|integer|exists:categories,id,deleted_at,NULL',
            'colors'  =>  'required',
            'colors.*'  =>  'required|integer|min:1',
            'sizes'   =>  'required',
            'sizes.*'   =>  'required|integer|min:1',
            'sort_description'  => 'required|max:1000',
            'image' => 'required|file|max:10000|mimes:bmp,png,gif,jpg,jpeg,pdf,doc,docx,ppt,pptx,xlsx,xls,csv',
            'shoesImages' =>  'nullable',
            'shoesImages.*'   =>  'nullable|file|max:10000|mimes:bmp,png,gif,jpg,jpeg,pdf,doc,docx,ppt,pptx,xlsx,xls,csv',
            'price_cost' => 'required|between:0,100000000.9999999|min:1|max:100000000',
            'price' => 'required|between:0,100000000.9999999|min:1|max:100000000',
            'is_sale' => 'nullable',
            'price_sale' => 'nullable|required_if:is_sale,1|between:0,100000000.9999999|min:1|max:100000000',
            'start_date_sale' => 'nullable|required_if:is_sale,1|date_format:Y-m-d',
            'end_date_sale' => 'nullable|required_if:is_sale,1|date_format:Y-m-d|after:start_date_sale',
            'long_description' => 'required',
        ];
    } 

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }
}
