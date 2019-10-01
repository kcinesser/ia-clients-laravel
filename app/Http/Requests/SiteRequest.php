<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteRequest extends FormRequest
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
            'URL' => 'required|sometimes|url',
            'description' => 'nullable',
            'status' => 'required|numeric|sometimes',
            'technology' => 'required|numeric|sometimes',
            'host_id' => 'required|numeric|sometimes',
            'services' => 'nullable|array',
            'services.*' => 'numeric',
            'prev_dev' => 'nullable',
            'notes' => 'nullable',
            'update_instructions' => 'nullable'
        ];
    }
}
