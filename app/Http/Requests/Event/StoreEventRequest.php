<?php

namespace App\Http\Requests\Event;


use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
//use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Response;

class StoreEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('event_create'), 403, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'string', 'max:255',
            ],
            'price' => [
                'required', 'string', 'max:255',
            ],
            'cover' => [
                'nullable', 'mimes:jpeg,svg,png',
            ],
            'description' => [
                'required',
            ],
            'location' => [
                'required', 'string', 'max:255',
            ],
            ];
    }
}
