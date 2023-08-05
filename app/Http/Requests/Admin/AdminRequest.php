<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
            'id' => 'unique:admins,id,'. optional($this->admin)->id,
            'nama' => 'required',
            'email' => 'required|unique:admins,email,'. optional($this->admin)->id,
            'password' => Rule::requiredIf(request()->routeIs('admin.store'))
        ];
    }
}
