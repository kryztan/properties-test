<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyTypeRequest;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class PropertyTypeController extends Controller
{
    public function index()
    {
        return view('property_types.index', [
            'property_types' => PropertyType::orderBy('name', 'asc')->paginate(10)
        ]);
    }

    public function create()
    {
        return view('property_types.create');
    }

    public function store(PropertyTypeRequest $request)
    {
        $attributes = $request->validated();

        $attributes['is_active'] = request('is_active') == 'on';

        $property_type = PropertyType::create($attributes);

        return redirect()->route('property-types.index')->with('success', 'Property type created!');
    }

    public function edit(PropertyType $property_type)
    {
        return view('property_types.edit', [
            'property_type' => $property_type,
        ]);
    }

    public function update(PropertyTypeRequest $request, PropertyType $property_type)
    {
        $attributes = $request->validated();

        $attributes['is_active'] = request('is_active') == 'on';

        $property_type->update($attributes);

        return back()->with('success', 'Property type updated!');
    }

    public function destroy(PropertyType $property_type)
    {
        $property_type->delete();

        return back()->with('success', 'Property Type deleted!');
    }
}
