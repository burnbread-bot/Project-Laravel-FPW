<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Produk
        </h2>
    </x-slot>

    <div class="p-6">
        <h3 class="text-lg font-semibold mb-5">Daftar Produk</h3>

        <div class="space-y-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="font-medium">Pulpen Gel Hitam</p>
                    <p class="text-sm text-gray-500">ST001</p>
                    <p class="text-sm">Stok 25</p>
                </div>

                <x-badge status="Aman" />
            </div>

            <div class="flex justify-between items-center">
                <div>
                    <p class="font-medium">Buku Tulis A5</p>
                    <p class="text-sm text-gray-500">ST002</p>
                    <p class="text-sm">Stok 7</p>
                </div>

                <x-badge status="Menipis" />
            </div>

            <div class="flex justify-between items-center">
                <div>
                    <p class="font-medium">Pensil 2B</p>
                    <p class="text-sm text-gray-500">ST003</p>
                    <p class="text-sm">Stok 0</p>
                </div>

                <x-badge status="Habis" />
            </div>

            <div class="flex justify-between items-center">
                <div>
                    <p class="font-medium">Penghapus</p>
                    <p class="text-sm text-gray-500">ST004</p>
                    <p class="text-sm">Stok 18</p>
                </div>

                <x-badge status="Aman" />
            </div>
        </div>
    </div>
</x-app-layout>