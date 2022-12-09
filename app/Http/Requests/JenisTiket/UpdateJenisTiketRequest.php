<?php

namespace App\Http\Requests\JenisTiket;

use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Http\FormRequest;

// this rule only at update request
use Illuminate\Validation\Rule;

class UpdatejenisTiketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('jenistiket_edit'), 403, '403 Forbidden');

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
            'name' => [
                'required', 'string', 'max:255', Rule::unique('jenistiket')->ignore($this->jenistiket),
            ],
        ];
    }
}
