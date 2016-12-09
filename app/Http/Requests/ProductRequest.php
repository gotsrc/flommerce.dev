<?php

namespace Flommerce\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id'   =>  'required|integer',
            'title'         =>  'required|min:3|max:100',
            'description'   =>  'required|min:5',
            'img_path'      =>  'max:255',
            'price'         =>  'required|numeric',
            'sale'          =>  'boolean|min:1',
            'slug'          =>  'required|alpha_dash|min:3|max:150'
        ];
    }
}
