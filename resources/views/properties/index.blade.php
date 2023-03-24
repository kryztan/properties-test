<x-layout>

    <div class="flex items-center justify-between">
        <div class="flex border-2 border-gray-200 rounded"></div>

        <a href="{{ route('properties.create') }}"
           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Property</a>
    </div>

    @if ($properties->count())
    <div class="table-header bg-gray-300 flex font-medium mb-1 mt-10 px-4 py-2 rounded-md text-md">
        <div class="w-3/12">
            Property Information
        </div>
        <div class="w-3/12">
            Type
        </div>
        <div class="w-3/12">
            Address
        </div>
        <div class="w-1/12">
            Images
        </div>
        <div class="w-2/12">

        </div>
    </div>
    <div class="table flex flex-col w-full">
        @foreach ($properties as $property)
        <div class="property flex border border-gray-300 rounded-md p-5 mb-1{{ ($loop->index % 2 == 0 ? '' : ' bg-gray-100') }}">
            <div class="column flex flex-col w-3/12 pr-0.5">
                <div class="info text-md text-gray-900 font-medium">
                    {{ $property->name }}
                </div>
                <div class="info text-sm text-gray-700">
                    {{ $property->description }}
                </div>
                <div class="info text-sm text-gray-700">
                    Bedrooms: {{ $property->bedrooms }}
                </div>
                <div class="info text-sm text-gray-700">
                    Bathrooms: {{ $property->bathrooms }}
                </div>
                <div class="info text-sm text-gray-700">
                    Size: {{ $property->size }} sq. m
                </div>
                <div class="info text-sm text-gray-700">
                    Council Tax Band: {{ $property->council_tax_band }}
                </div>
                <div class="info text-sm text-gray-700">
                    Price: {{ $property->currency }} {{ $property->price }}
                </div>
                <div class="info text-sm text-gray-700">
                    Tenure: {{ $property->tenure }}
                </div>
            </div>
            <div class="column flex flex-col w-3/12">
                <div class="course text-sm text-gray-900">
                    {{ $property->propertyType->name }}
                </div>
                <div class="course text-sm text-gray-900">
                    {{ $property->propertyType->description }}
                </div>
            </div>
            <div class="column flex flex-col w-3/12">
                <div class="course text-sm text-gray-900">
                    {{ $property->address->address_line_1 }}
                </div>
                <div class="course text-sm text-gray-900">
                    {{ $property->address->address_line_2 }}
                </div>
                <div class="course text-sm text-gray-900">
                    {{ $property->address->city }}
                </div>
                <div class="course text-sm text-gray-900">
                    {{ $property->address->county }}
                </div>
                <div class="course text-sm text-gray-900">
                    {{ $property->address->postcode }}
                </div>
                <div class="course text-sm text-gray-900">
                    Lat: {{ $property->address->latitude }}
                </div>
                <div class="course text-sm text-gray-900">
                    Long: {{ $property->address->longitude }}
                </div>
            </div>
            <div class="column flex flex-col w-1/12">
                @foreach($property->getMedia() as $image)
                    <img src="{{ $image->getFullUrl() }}" alt="image" class="w-8 h-8 rounded-full">
                @endforeach
            </div>
            <div class="column flex flex-col w-2/12">
                <a href="{{ route('properties.edit', ['property' => $property->slug]) }}"
                   class="action text-sm font-medium text-blue-600 hover:text-blue-700">View / Edit</a>
                <div class="action">
                    <form action="{{ route('properties.destroy', ['property' => $property->slug]) }}" method="POST"
                        class="property-del-form">
                        @csrf
                        @method('DELETE')

                        <button class="property-del-btn text-sm font-medium text-red-600 hover:text-red-700">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p class="text-center mt-36">No properties found.</p>
    @endif

    <div class="mt-10">
        {{ $properties->links() }}
    </div>

    <x-slot:script>

        <script>
            $(document).ready(function() {
                $(".property-del-btn").click(function (event) {
                    event.preventDefault();

                    if (confirm("Are you sure you want to delete this property?")) {
                        $(this).closest(".property-del-form").submit();
                    }
                });
            });
        </script>

    </x-slot>

</x-layout>
