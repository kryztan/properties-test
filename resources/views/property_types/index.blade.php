<x-layout>

    <div class="flex items-center justify-between">
        <div class="flex border-2 border-gray-200 rounded"></div>

        <a href="{{ route('property-types.create') }}"
           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Property Type</a>
    </div>

    @if ($property_types->count())
        <div class="table-header bg-gray-300 flex font-medium mb-1 mt-10 px-4 py-2 rounded-md text-md">
            <div class="w-4/12">
                Property Type
            </div>
            <div class="w-3/12">
                Description
            </div>
            <div class="w-3/12">
                Active
            </div>
            <div class="w-2/12">

            </div>
        </div>
        <div class="table flex flex-col w-full">
            @foreach ($property_types as $type)
                <div class="property flex border border-gray-300 rounded-md p-5 mb-1{{ ($loop->index % 2 == 0 ? '' : ' bg-gray-100') }}">
                    <div class="column flex flex-col w-4/12 pr-0.5">
                        <div class="info text-md text-gray-900 font-medium">
                            {{ $type->name }}
                        </div>
                    </div>
                    <div class="column flex flex-col w-3/12">
                        <div class="course text-sm text-gray-900">
                            {{ $type->description }}
                        </div>
                    </div>
                    <div class="column flex flex-col w-3/12">
                        <div class="course text-sm text-gray-900">
                            {{ $type->is_active ? 'Yes' : 'No' }}
                        </div>
                    </div>
                    <div class="column flex flex-col w-2/12">
                        <a href="{{ route('property-types.edit', ['property_type' => $type->id]) }}"
                           class="action text-sm font-medium text-blue-600 hover:text-blue-700">View / Edit</a>
                        <div class="action">
                            <form action="{{ route('property-types.destroy', ['property_type' => $type->id]) }}" method="POST"
                                  class="property-type-del-form">
                                @csrf
                                @method('DELETE')

                                <button class="property-type-del-btn text-sm font-medium text-red-600 hover:text-red-700">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center mt-36">No property types found.</p>
    @endif

    <div class="mt-10">
        {{ $property_types->links() }}
    </div>

    <x-slot:script>

        <script>
            $(document).ready(function() {
                $(".property-type-del-btn").click(function (event) {
                    event.preventDefault();

                    if (confirm("Deleting this property type will also delete all properties of this type. Are you sure you want to delete this property type?")) {
                        $(this).closest(".property-type-del-form").submit();
                    }
                });
            });
        </script>

    </x-slot>

</x-layout>
