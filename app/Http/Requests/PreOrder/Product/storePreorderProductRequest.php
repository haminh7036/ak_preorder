<?php

namespace App\Http\Requests\PreOrder\Product;

use Illuminate\Foundation\Http\FormRequest;

class storePreorderProductRequest extends FormRequest
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
            'preorder_page_id'=>'required',
            'status'=>'required',
            'Product_Name'=>'required',
            'Product_Code'=>'required',
            'Price'=>'required|numeric',
            'Reduced_Price'=>'required|numeric',
            'Deposit' => 'required|numeric',
            'Quantity'=> 'required|numeric',
            'Material'=> 'required',
            'Face_diameter' => 'required',
            'Type' => 'required',
            'Frame' => 'required',
            'Case_diameter' => 'required',
            'Wire_Material' => 'required',
            'Wire_Width' => 'required',
            'Waterproof' => 'required',
            'Energy_Sources' => 'required',
            'Battery_life_time' => 'required',
            'User_Object' => 'required',
            'Trademark' => 'required',
        ];
    }
}
