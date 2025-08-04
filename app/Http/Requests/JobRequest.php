<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:20'],
            'salary'      => ['required', 'numeric', 'min:0'],
            'location'    => ['required', 'string'],
            'region'      => ['required', 'string'],
            'job_type'    => ['required'],
            'deadline'    => ['required', 'date', 'after_or_equal:today'],
        ];
    }
    public function messages(): array
    {
        return [
           'title.required'       => 'Vui lòng nhập tiêu đề công việc.',
            'description.required' => 'Vui lòng nhập mô tả công việc.',
            'description.min'      => 'Mô tả công việc phải ít nhất 20 ký tự.',
            'salary.required'      => 'Vui lòng nhập mức lương.',
            'salary.numeric'       => 'Lương phải là số.',
            'salary.min'           => 'Lương không được âm.',
            'location.required'    => 'Vui lòng nhập địa điểm.',
            'region.required'      => 'Vui lòng chọn khu vực.',
            'job_type.required'    => 'Vui lòng chọn loại công việc.',
            'job_type.in'          => 'Loại công việc không hợp lệ.',
            'deadline.required'    => 'Vui lòng nhập hạn chót nộp hồ sơ.',
            'deadline.date'        => 'Hạn chót phải là ngày hợp lệ.',
            'deadline.after_or_equal' => 'Hạn chót phải từ hôm nay trở đi.',
        ];
    }
}
