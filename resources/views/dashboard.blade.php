<!-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - POS Barokah Mart</title>
</head>
<body style="font-family: sans-serif; padding: 40px;">
    <h1>Selamat Datang di Dashboard POS</h1>
    <p>Anda berhasil login!</p>
</body>
</html> -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-card>
                <h3 class="text-lg font-semibold mb-2">Ringkasan Hari Ini</h3>
                <p class="text-gray-600">Selamat datang, {{ auth()->user()->name }}.</p>
            </x-card>
        </div>
    </div>
</x-app-layout>

