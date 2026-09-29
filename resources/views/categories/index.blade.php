<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Kategori
        </h2>
    </x-slot>

    <div class="p-6">
        <!-- <h3 class="text-lg font-semibold mb-5">Daftar Kategori</h3> -->

        <div class="space-y-4">
            @foreach ($categories as $category)
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-medium">{{ $category->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>