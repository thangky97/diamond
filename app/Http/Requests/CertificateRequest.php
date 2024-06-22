<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateRequest extends FormRequest
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
    public function rules()
    {
        return [
            'sochungthu' => 'required',
            'shap' => 'required',
            'kichthuoc' => 'required',
            'weight' => 'required',
            'dotinhkhiet' => 'required',
            'color' => 'required',
            'dochetac' => 'required',
            'dochoi' => 'required',
            'dophatlua' => 'required',
            'dolaplanh' => 'required',
            'huynhquang' => 'required',
        ];
    }

    // Cấu hình nội dung messages theo rules bên trên
    public function messages()
    {
        return [
            'sochungthu.required' => 'Vui lòng nhập số chứng thư',
            'shap.required' => 'Vui lòng nhập hình dạng',
            'kichthuoc.required' => 'Vui lòng nhập kích thước',
            'weight.required' => 'Vui lòng nhập trọng lượng',
            'dotinhkhiet.required' => 'Vui lòng nhập độ tinh khiết',
            'color.required' => 'Vui lòng nhập màu',
            'dochetac.required' => 'Vui lòng nhập độ chế tác',
            'dochoi.required' => 'Vui lòng nhập độ chói',
            'dophatlua.required' => 'Vui lòng nhập độ phát lửa',
            'dolaplanh.required' => 'Vui lòng nhập độ lấp lánh',
            'huynhquang.required' => 'Vui lòng nhập huỳnh quang',
        ];
    }
}
