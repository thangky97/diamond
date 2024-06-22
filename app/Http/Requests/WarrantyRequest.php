<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarrantyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'product_id' => 'required',
            'time' => 'required',
            'date' => 'required',
            'description' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Bạn chưa chọn người dùng!',
            'product_id.required' => 'Bạn chưa chọn sản phẩm!',
            'time.required' => 'Vui lòng nhập thời gian bảo hành!',
            'date.required' => 'Vui lòng chọn ngày tạo!',
            'description.required' => 'Vui lòng nhập mô tả!',
        ];
    }
}
