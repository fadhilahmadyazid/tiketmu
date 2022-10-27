<?php

namespace App\Http\Requests\Ticket;


use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('ticket_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'email_user' => [
                'required', 'integer',
            ],
            'nama_tiket' => [
                'required', 'string', 'max:255',
            ],
            'no_tiket' => [
                'required', 'string', 'max:255',
            ],
            'jenis_tiket' => [
                'required', 'string', 'max:255',
            ]
            ];
    }
}
