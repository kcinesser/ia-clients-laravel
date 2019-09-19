<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use mysqli;

class ClientRequest extends FormRequest
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
            'name' => 'required|sometimes',
            'contact_name' => 'nullable',
            'contact_email' => 'nullable',
            'contact_phone' => 'nullable',
            'account_manager_id' => 'required|numeric|sometimes',
            'status' => 'numeric|sometimes',
            'notes' => 'nullable'
        ];
    }
}
