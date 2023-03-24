<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PropertyTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'description' => 'required|string',
            'is_active' => 'sometimes|string'
        ];

        return $rules + ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'name' => 'required|string|unique:property_types,name',
        ];
    }

    protected function update(): array
    {
        return [
            'name' => ['required', 'string', Rule::unique('property_types', 'name')->ignore($this->property_type->id)],
        ];
    }
}
