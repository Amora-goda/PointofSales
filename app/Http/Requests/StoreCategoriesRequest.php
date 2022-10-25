<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriesRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

            'name' => 'required|unique:categories,name->ar,'.$this->id,
            'name_en' => 'required|unique:categories,name->en,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يرجي ادخال اسم القسم باللغة العربية',
            'name_en.required' => 'يرجي ادخال اسم القسم باللغة الانجليزية',
        ];
    }


}
