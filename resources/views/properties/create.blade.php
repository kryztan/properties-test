<x-layout>

    <div class="my-10 sm:mt-0">
        <x-back-button link="{{ route('home') }}">Back to Properties</x-back-button>

        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Create New Property</h3>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="shadow overflow-hidden sm:rounded-md mb-3">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="text-base font-medium text-gray-900 mb-3">Property Information</div>

                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" name="name" id="name" autocomplete="name"
                                        class="p-3 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        value="{{ old('name') }}" required>
                                </div>
                                @error("name")
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                                    <input type="text" name="slug" id="slug"
                                        class="p-3 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        value="{{ old('slug') }}" required>
                                </div>
                                @error("slug")
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="bedrooms" class="block text-sm font-medium text-gray-700">Bedrooms</label>
                                    <input type="number" name="bedrooms" id="bedrooms" min="0"
                                        class="p-3 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        value="{{ old('bedrooms') }}" required>
                                </div>
                                @error("bedrooms")
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="bathrooms" class="block text-sm font-medium text-gray-700">Bathrooms</label>
                                    <input type="number" name="bathrooms" id="bathrooms" min="0"
                                        class="p-3 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        value="{{ old('bathrooms') }}" required>
                                </div>
                                @error("bathrooms")
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="size" class="text-sm font-medium text-gray-700">Size</label> <span class="text-xs font-medium text-gray-700">(sq. m)</span>
                                    <input type="number" name="size" id="size" min="0"
                                        class="p-3 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        value="{{ old('size') }}" required>
                                </div>
                                @error("size")
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <input type="text" name="description" id="description"
                                        class="p-3 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        value="{{ old('description') }}" required>
                                </div>
                                @error("description")
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="council_tax_band" class="block text-base font-medium text-gray-900 mb-3">Council Tax Band</label>
                                    <select id="council_tax_band" name="council_tax_band"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                            @foreach (range('A', 'H') as $council_tax_band)
                                                <option value="{{ $council_tax_band }}"{{ old('council_tax_band') == $council_tax_band ? ' selected' : '' }}>
                                                    {{ $council_tax_band }}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>
                                @error("council_tax_band")
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                    <input type="text" name="price" id="price"
                                        class="p-3 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        value="{{ old('price') }}" required>
                                </div>
                                @error("price")
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="currency" class="block text-base font-medium text-gray-900 mb-3">Currency</label>
                                    <select id="currency" name="currency"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </select>
                                </div>
                                @error("currency")
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="tenure" class="block text-sm font-medium text-gray-700">Tenure</label>
                                    <input type="text" name="tenure" id="tenure"
                                        class="p-3 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        value="{{ old('tenure') }}" required>
                                </div>
                                @error("tenure")
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="shadow overflow-hidden sm:rounded-md mb-3">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="flex items-end">
                                <div class="w-1/2">
                                    <label for="property_type_id" class="block text-base font-medium text-gray-900 mb-3">Property Type</label>
                                    <select id="property_type_id" name="property_type_id"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        @foreach ($property_types as $property_type)
                                            <option value="{{ $property_type->id }}"{{ old('property_type_id') == $property_type->id ? ' selected' : '' }}>
                                                {{ $property_type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error("property_type_id")
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="shadow overflow-hidden sm:rounded-md mb-3">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="text-base font-medium text-gray-900 mb-3">Images</div>

                            <div id="image-container" data-count="1">
                                <input type="file" id="image-1" name="image-1" accept="image/*"
                                    class="mb-5 p-3 border mt-2 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <button type="button" id="add-image"
                                class="mt-5 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Add Another Image
                            </button>

                        </div>
                    </div>

                    <div class="shadow overflow-hidden sm:rounded-md mb-3">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="text-base font-medium text-gray-900 mb-3">Address</div>

                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="address_line_1" class="block text-sm font-medium text-gray-700">Address Line 1</label>
                                    <input type="text" name="address_line_1" id="address_line_1"
                                           class="p-3 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                           value="{{ old('address_line_1') }}" required>
                                </div>
                                @error("address_line_1")
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="address_line_2" class="block text-sm font-medium text-gray-700">Address Line 2</label>
                                    <input type="text" name="address_line_2" id="address_line_2"
                                           class="p-3 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                           value="{{ old('address_line_2') }}" required>
                                </div>
                                @error("address_line_2")
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                    <input type="text" name="city" id="city"
                                           class="p-3 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                           value="{{ old('city') }}" required>
                                </div>
                                @error("city")
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="county" class="block text-sm font-medium text-gray-700">County</label>
                                    <input type="text" name="county" id="county"
                                           class="p-3 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                           value="{{ old('county') }}" required>
                                </div>
                                @error("county")
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="postcode" class="block text-sm font-medium text-gray-700">Postcode</label>
                                    <input type="text" name="postcode" id="postcode"
                                           class="p-3 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                           value="{{ old('postcode') }}" required>
                                </div>
                                @error("postcode")
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="button" id="lookup-coordinates"
                                class="my-5 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Lookup Coordinates
                            </button>

                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
                                    <input type="text" name="latitude" id="latitude"
                                           class="p-3 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                           value="{{ old('latitude') }}" required>
                                </div>
                                @error("latitude")
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
                                    <input type="text" name="longitude" id="longitude"
                                           class="p-3 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                           value="{{ old('longitude') }}" required>
                                </div>
                                @error("longitude")
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 mt-0.5">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-slot:script>

        <script>
            $(document).ready(function() {

                $.get('https://openexchangerates.org/api/currencies.json', function(data) {
                    let content = ``;

                    for (const [currencyCode, currencyName] of Object.entries(data)) {
                        content += `<option value="${currencyCode}">${currencyCode}</option>`;
                    }

                    $('#currency').html(content);
                });

                $('#add-image').click(function () {
                    let container = $('#image-container');
                    let count = container.data('count');
                    count++;

                    if (count > 10) {
                        return;
                    }

                    container.append(
                        `<input type="file" id="image-${count}" name="image-${count}" accept="image/*"
                    class="mb-5 p-3 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">`
                    );
                    container.data('count', count);
                });

                $('#lookup-coordinates').click(function () {
                    let url = 'https://maps.googleapis.com/maps/api/geocode/json?key={{ config('services.google_maps.key') }}';
                    let address = $('#address_line_1').val() + ' ' + $('#address_line_2').val() + ' ' + $('#city').val() + ' '
                        + $('#county').val() + ' ' + $('#postcode').val();

                    url += '&address=' + address;
                    url = encodeURI(url);

                    $.get(url, function(data) {
                        if (data.status == 'OK') {
                            let location = data.results[0].geometry.location;

                            $('#latitude').val(location.lat);
                            $('#longitude').val(location.lng);
                        } else {
                            alert(data.status);
                        }
                    });
                });

            });
        </script>

    </x-slot>

</x-layout>
