<?php

namespace Lianpark\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 이 값은 현재 유저가 저장이 가능한지 검사하는 역할입니다만 지금은 유저의 권한 개념이 없으므로 true
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // ProductController의 조건과 더불어 신규 조건을 추가했습니다
        return [
            'name' => 'required|max:63',
            'content' => 'required|max:255'
        ];
    }
}
