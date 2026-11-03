<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Riwayat Transaksi Saya
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Ringkasan Transaksi Kasir -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-card>
                    <p class="text-sm text-gray-500">Total Transaksi Saya</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ number_format($totalTransactions, 0, ',', '.') }} Transaksi</p>
                </x-card>
                <x-card>
                    <p class="text-sm text-gray-500">Total Penjualan Saya</p>
                    <p class="text-2xl font-bold text-indigo-600 mt-1">Rp{{ number_format($totalSales, 0, ',', '.') }}</p>
                </x-card>
            </div>

            <!-- Tabel Riwayat Transaksi -->
            <x-card>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Invoice</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal & Waktu</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item Produk</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Bayar</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Kembali</th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($transactions as $transaction)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 text-sm font-semibold text-gray-900 whitespace-nowrap">
                                        {{ $transaction->invoice_number }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-600 whitespace-nowrap">
                                        {{ $transaction->created_at->format('d M Y H:i') }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-600">
                                        <ul class="text-xs space-y-1">
                                            @foreach ($transaction->details as $detail)
                                                <li>
                                                    <span class="font-medium text-gray-700">{{ $detail->product->name ?? 'Produk Dihapus' }}</span>
                                                    <span class="text-gray-500">(x{{ $detail->qty }} &middot; Rp{{ number_format($detail->subtotal, 0, ',', '.') }})</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-right font-semibold text-gray-900 whitespace-nowrap">
                                        Rp{{ number_format($transaction->total, 0, ',', '.') }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-right text-gray-600 whitespace-nowrap">
                                        Rp{{ number_format($transaction->pay, 0, ',', '.') }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-right text-gray-600 whitespace-nowrap">
                                        Rp{{ number_format($transaction->change, 0, ',', '.') }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-center whitespace-nowrap">
                                        <a href="{{ route('pos.struk', $transaction) }}"
                                            class="inline-block bg-indigo-50 text-indigo-600 hover:bg-indigo-100 px-3 py-1.5 rounded-md font-medium text-xs transition">
                                            Lihat Struk
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                                        Belum ada riwayat transaksi.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($transactions->hasPages())
                    <div class="mt-4">
                        {{ $transactions->links() }}
                    </div>
                @endif
            </x-card>
        </div>
    </div>
</x-app-layout>
