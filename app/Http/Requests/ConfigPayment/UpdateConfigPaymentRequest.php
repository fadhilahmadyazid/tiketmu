<?php

namespace App\Http\Requests\ConfigPayment;

use App\Models\MasterData\ConfigPayment;
use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateConfigPaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('config_payment_edit'), 403, '403 Forbidden');

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
            'price' => [
                'required', 'string', 'max:255',
            ],
            'pajak' => [
                'required', 'string', 'max:255',
            ],
            'total' => [
                'required', 'string', 'max:255',
            ],
        ];
    }
}
