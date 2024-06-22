<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoucherRequest extends FormRequest
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
            'code' => ['required', 'regex:/^\S*$/'],
            'name' => 'required',
            'discount' => 'required|gte:0',
            'start_date' => 'required',
            'end_date' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Mã sản phẩm bắt buộc nhập!',
            'code.regex' => 'Mã sản phẩm không được chứa khoảng trắng!',
            'name.required' => 'Vui lòng nhập tên chương trình!',
            'discount.required' => 'Vui lòng nhập mã giảm giá!',
            'discount.gte' => 'Giá phải là số dương không âm',
            'start_date.required' => 'Vui lòng chọn ngày bắt đầu!',
            'end_date.required' => 'Vui lòng chọn ngày kết thúc!',
        ];
    }
}
