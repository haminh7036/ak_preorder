<?php

namespace App\Http\Requests\PreOrder\Order;

use Illuminate\Foundation\Http\FormRequest;

class storeOrderRequest extends FormRequest
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
            'Gender'=>'required',
            'Name'=>'required',
            'Phone_Number'=>'required|numeric',
            'Payment'=>'required|in:Chuyển khoản ngân hàng,Đặt cọc tại cửa hàng,Thanh toán AlePay'
        ];
    }
}