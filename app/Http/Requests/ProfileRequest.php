<?php

namespace App\Http\Requests;

use App\Rules\Nickname;
use App\Rules\Telephone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
            'nickname' => ['required', new Nickname(), Rule::unique('users', 'nickname')],
            'name' => ['required', 'min:2', 'max:50'],
            'surname' => ['required', 'min:2', 'max:50'],
            'avatar' => ['required', 'image'],
            'phone' => ['required', new Telephone(), Rule::unique('users', 'phone')],
            'sex' => ['required'],
            'showPhone' => ['boolean']
        ];
    }
}
