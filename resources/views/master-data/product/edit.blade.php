<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Produk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <x-card>
                <form action="{{ route('products.update', $product) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    {{-- Kategori --}}
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700">
                            Kategori
                        </label>
                        <select
                            id="category_id"
                            name="category_id"
                            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                        >
                            <option value="" disabled @selected(!old('category_id', $product->category_id))>
                                Pilih kategori
                            </option>
                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    @selected(old('category_id', $product->category_id) == $category->id)
                                >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kode Produk --}}
                    <div>
                        <label for="code" class="block text-sm font-medium text-gray-700">
                            Kode Produk
                        </label>
                        <input
                            id="code"
                            type="text"
                            name="code"
                            value="{{ old('code', $product->code) }}"
                            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                        >
                        @error('code')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Nama Produk --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Nama Produk
                        </label>
                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name', $product->name) }}"
                            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                        >
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Satuan, Harga, dan Stok --}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label for="unit" class="block text-sm font-medium text-gray-700">
                                Satuan
                            </label>
                            <input
                                id="unit"
                                type="text"
                                name="unit"
                                value="{{ old('unit', $product->unit) }}"
                                class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                            >
                            @error('unit')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700">
                                Harga
                            </label>
                            <input
                                id="price"
                                type="number"
                                name="price"
                                min="0"
                                value="{{ old('price', $product->price) }}"
                                class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                            >
                            @error('price')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700">
                                Stok
                            </label>
                            <input
                                id="stock"
                                type="number"
                                name="stock"
                                min="0"
                                value="{{ old('stock', $product->stock) }}"
                                class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                            >
                            @error('stock')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex justify-end gap-2 pt-2">
                        <a
                            href="{{ route('products.index') }}"
                            class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50 text-sm font-medium"
                        >
                            Batal
                        </a>
                        <button
                            type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium"
                        >
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</x-app-layout>
