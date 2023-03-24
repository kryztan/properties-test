<?php

namespace App\Http\Requests;

use App\Models\Property;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class PropertyRequest extends FormRequest
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
            'name' => 'required|string',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'size' => 'required|integer|min:0',
            'description' => 'required|string',
            'council_tax_band' => [
                'required',
                Rule::in(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']),
            ],
            'price' => 'required|decimal:0,2',
            'currency' => 'required|string|size:3',
            'tenure' => 'required|string',
            'property_type_id' => 'required|exists:property_types,id',
            'address_line_1' => 'required|string',
            'address_line_2' => 'required|string',
            'city' => 'required|string',
            'county' => 'required|string',
            'postcode' => 'required|string',
            'latitude' => 'required|regex:/^-?\d*\.{0,8}\d+$/',
            'longitude' => 'required|regex:/^-?\d*\.{0,8}\d+$/',
        ];
        for ($i = 1; $i <= 10; $i++) {
            $rules['image-'.$i] = 'sometimes|image';
        }

        return $rules + ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store(): array
    {
        return [
            'slug' => 'required|string|unique:properties,slug',
        ];
    }

    protected function update(): array
    {
        return [
            'slug' => ['required', 'string', Rule::unique('properties', 'slug')->ignore($this->property->id)],
            'delete_media_idx' => 'json'
        ];
    }
}
