<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\Address;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Support\Facades\Log;

class PropertyController extends Controller
{
    public function index()
    {
        return view('properties.index', [
            'properties' => Property::orderBy('name', 'asc')->paginate(10)
        ]);
    }

    public function create()
    {
        return view('properties.create', [
            'property_types' => PropertyType::where('is_active', 1)->orderBy('name')->get()
        ]);
    }

    public function store(PropertyRequest $request)
    {
        $attributes = $request->validated();

        $property = Property::create($attributes);

        for ($j = 1; $j <= 10; $j++) {
            if (array_key_exists('image-'.$j, $attributes)) {
                $property->addMedia(request('image-'.$j))->toMediaCollection();
            }
        }

        $address = new Address($attributes);
        $property->address()->save($address);

        return redirect()->route('home')->with('success', 'Property created!');
    }

    public function edit(Property $property)
    {
        $images = $property->getMedia();

        return view('properties.edit', [
            'property' => $property,
            'property_types' => PropertyType::where('is_active', 1)->orderBy('name')->get(),
            'images' => $images
        ]);
    }

    public function update(PropertyRequest $request, Property $property)
    {
        $attributes = $request->validated();

        $property->update($attributes);

        $images = $property->getMedia();
        $delete_media_idx = json_decode($attributes['delete_media_idx'], true);
        foreach ($delete_media_idx as $idx) {
            $images[$idx]->delete();
        }

        for ($j = 1; $j <= 10; $j++) {
            if (array_key_exists('image-'.$j, $attributes)) {
                $property->addMedia(request('image-'.$j))->toMediaCollection();
            }
        }

        $addressUpdates = [
            'address_line_1' => $attributes['address_line_1'],
            'address_line_2' => $attributes['address_line_2'],
            'city' => $attributes['city'],
            'county' => $attributes['county'],
            'postcode' => $attributes['postcode'],
            'latitude' => $attributes['latitude'],
            'longitude' => $attributes['longitude']
        ];
        $property->address()->update($addressUpdates);

        return redirect()->route('properties.edit', $attributes['slug'])->with('success', 'Property updated!');
    }

    public function destroy(Property $property)
    {
        $property->delete();

        return back()->with('success', 'Property deleted!');
    }
}
