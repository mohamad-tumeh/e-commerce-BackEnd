<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends ApiFormRequest
{

    public function rules()
    {
        return [
            'check_type'              =>     'required|boolean',
            'description'             =>     'required',
            'an_description'          =>     'required',
            'name' 	                  =>      'required',
            'an_name' 	              =>      'required',
            'price_product'           =>      'required',
            'image'                   =>      'required|image|mimes:jpg,png,jpeg,gif,svg,bmp',
            'sku'                     =>      'required',
            'section_id'              =>      'required',
            'bar_code'                =>  	  'required',
            ];
    }
}
