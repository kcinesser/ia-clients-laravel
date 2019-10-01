<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HostedDomainRequest extends FormRequest
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
            'name' => 'required|unique:hosted_domains,name',
            'exp_date' => 'nullable|date',
            'site_id' => 'nullable|numeric|sometimes',
            'remote_provider_type' => 'nullable|numeric|sometimes',
            'remote_provider_id' => 'nullable|numeric',
            'free_with_mma' => 'string'
        ];
    }
}
