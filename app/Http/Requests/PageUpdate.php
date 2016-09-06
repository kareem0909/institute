<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageUpdate extends FormRequest
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
            'title_ar' => 'required|min:3',
            'title_en' => 'required|min:3',
            'category_id' => 'required',
            'order' => 'required',
            'image' => 'mimes:jpeg,bmp,png',
            'gallery' => 'array',
        ];
    }
}
