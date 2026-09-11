<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Akses Ditolak - POS Barokah Mart</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-sm w-full max-w-md text-center">
        <h1 class="text-2xl font-semibold text-red-600 mb-2">403 - Akses Ditolak</h1>
        <p class="text-gray-600 mb-4">
            Anda login sebagai <strong>{{ auth()->user()->role ?? 'tamu' }}</strong>,
            halaman ini hanya untuk role: <strong>{{ implode(', ', $roleDibutuhkan) }}</strong>.
        </p>
        <a href="{{ route('dashboard') }}" class="text-indigo-600 underline">Kembali ke Dashboard</a>
    </div>
</body>
</html>
