@props(['type' => 'aman'])

@php
    $classes = match($type) {
        'aman' => 'bg-green-100 text-green-800 border-green-300',
        'menipis' => 'bg-yellow-100 text-yellow-800 border-yellow-300',
        'habis' => 'bg-red-100 text-red-800 border-red-300',
        default => 'bg-gray-100 text-gray-800 border-gray-300',
    };
@endphp

<span class="px-2.5 py-0.5 text-xs font-semibold rounded-full border {{ $classes }}">
    {{ $slot }}
</span>