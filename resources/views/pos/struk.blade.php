<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Struk Transaksi</h2>
    </x-slot>
    
    <style>
        @media print {
            nav, header, .no-print {
                display: none !important;
            }
            body {
                background-color: white !important;
            }
            .py-8 {
                padding-top: 0 !important;
                padding-bottom: 0 !important;
            }
            .shadow-sm {
                box-shadow: none !important;
            }
        }
    </style>

    <div class="py-8">
        <div class="max-w-md mx-auto sm:px-6">
            <x-card>
                <p class="text-center font-semibold">POS Barokah Mart</p>
                <p class="text-center text-xs text-gray-500 mb-3">{{ $transaction->invoice_number }}</p>
                <p class="text-xs text-gray-500 mb-3">
                    {{ $transaction->created_at->format('d M Y H:i') }} &middot; Kasir: {{ $transaction->user->name }}
                </p>
                <hr class="mb-3">
                @foreach ($transaction->details as $detail)
                    <div class="flex justify-between text-sm mb-1">
                        <span>{{ $detail->product->name }} x{{ $detail->qty }}</span>
                        <span>Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</span>
                    </div>
                @endforeach
                <hr class="my-3">
                <div class="flex justify-between font-semibold">
                    <span>Total</span><span>Rp{{ number_format($transaction->total, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span>Bayar</span><span>Rp{{ number_format($transaction->pay, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span>Kembali</span><span>Rp{{ number_format($transaction->change, 0, ',', '.') }}</span>
                </div>

                <div class="mt-4 flex gap-2 no-print print:hidden">
                    <button type="button" onclick="window.print()" class="flex-1 bg-gray-800 hover:bg-gray-700 text-white py-2 rounded-md font-medium text-center transition cursor-pointer">
                        Cetak Struk
                    </button>
                    <a href="{{ route('pos.index') }}" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-md font-medium text-center transition">
                        Transaksi Baru
                    </a>
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>
