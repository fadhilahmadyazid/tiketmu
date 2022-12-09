<?php

namespace App\Http\Requests\Event;
use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('event_update'), 403, '403 Forbidden');

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
                'nullable', 'mimes:jpeg,svg,png', 'max:10000',
            ],
            'description' => [
                'required', 'longtext', 'max:1000000',
            ],
            'location' => [
                'required', 'string', 'max:255',
            ],
            ];
    }
}
