<?php

namespace App\Http\Resources;

use App\Models\Address;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'size' => $this->size,
            'description' => $this->description,
            'council_tax_band' => $this->council_tax_band,
            'price' => $this->price,
            'currency' => $this->currency,
            'tenure' => $this->tenure,
            'property_type_id' => $this->property_type_id,
            'property_types' => new PropertyTypeResource(PropertyType::findOrFail($this->propertyType->id)),
            'address' => new AddressResource(Address::findOrFail($this->address->id)),
            'images' => $this->getMedia(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
