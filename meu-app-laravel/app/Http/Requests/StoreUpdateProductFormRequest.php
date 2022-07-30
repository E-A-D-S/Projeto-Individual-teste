<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id =$this->id ??'';

        $rules = [
            'name' => 'required|string|max:50|min:3',
            'image'=>[
                'file'
                
            ],

        ];
           

            
                return $rules;
}
    
}