<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'title' => 'required|sometimes',
            'site_id' => 'nullable|numeric|sometimes',
            'description' => 'nullable|sometimes',
            'status' => 'required|numeric|sometimes',
            'start_date' => 'nullable|date|sometimes',
            'end_date' => 'nullable|date|sometimes',
            'go_live_date' => 'nullable|date|sometimes',
            'developer_id' => 'nullable|numeric|sometimes',
            'technology' => 'nullable|numeric|sometimes',
            'notes' => 'nullable'
        ];
    }
}
