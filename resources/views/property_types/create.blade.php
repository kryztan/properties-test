<x-layout>

    <div class="my-10 sm:mt-0">
        <x-back-button link="{{ route('property-types.index') }}">Back to Property Types</x-back-button>

        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Create New Property Types</h3>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('property-types.store') }}" method="POST">
                    @csrf

                    <div class="shadow overflow-hidden sm:rounded-md mb-3">
                        <div class="px-4 py-5 bg-white sm:p-6">
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
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <input type="text" name="description" id="description"
                                           class="p-3 border mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                           value="{{ old('description') }}" required>
                                </div>
                                @error("description")
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror

                                <div class="col-span-6 sm:col-span-4">
                                    <div class="flex items-start my-2">
                                        <div class="flex items-center h-5">
                                            <input id="is_active" name="is_active" type="checkbox"{{ old('is_active') ? ' checked' : '' }}
                                                   class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="is_active" class="font-medium text-gray-700">Active</label>
                                        </div>
                                    </div>
                                </div>
                                @error("is_active")
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

</x-layout>
