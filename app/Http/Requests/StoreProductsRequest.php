<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|unique:products,name->ar,'.$this->id,
            'name_en' => 'required|unique:products,name->en,'.$this->id,
            'categorie_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'هذا الحقل مطلوب',
            'name_en.required' => 'هذا الحقل مطلوب',
            'name.unique' => 'حقل المنتج باللغة العربية موجود مسبقا',
            'name_en.unique' => 'حقل المنتج باللغة الانجليزية موجود مسبقا',
            'categorie_id.required' => 'هذا الحقل مطلوب',
        ];
    }
}
