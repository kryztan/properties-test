@props(['link'])

<div class="mb-10">
    <a href="{{ $link }}" class="bg-transparent border border-blue-800 font-semibold hover:bg-blue-500 hover:border-transparent hover:text-white
        px-4 py-2 rounded text-blue-800 text-sm">{{ $slot }}</a>
</div>
