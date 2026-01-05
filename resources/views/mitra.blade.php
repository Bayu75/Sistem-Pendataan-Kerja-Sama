<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Mitra Kerja Sama</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="font-poppins bg-white pt-20">
<x-navbar></x-navbar>

<div class="max-w-7xl mx-auto px-6 py-10">
    <h1 class="text-4xl font-bold mb-6">Daftar Mitra Kerja Sama</h1>

    @forelse($mitra as $item)
    <div class="bg-gray-100 rounded-lg shadow p-6 mb-6">
        <h2 class="text-2xl font-bold mb-4">{{ $item->nama_mitra }}</h2>

        <div class="border-t border-gray-400 my-2"></div>
        <p><span class="font-semibold">Program Studi:</span> {{ $item->program_studi }}</p>

        <div class="border-t border-gray-400 my-2"></div>
        <p><span class="font-semibold">Judul Kerja Sama:</span> {{ $item->nama_kerjasama }}</p>

        <div class="border-t border-gray-400 my-2"></div>
        <p><span class="font-semibold">Jenis Dokumen:</span> {{ $item->jenis_dokumen }}</p>

        <div class="border-t border-gray-400 my-2"></div>
        <p><span class="font-semibold">PIC:</span> {{ $item->pic }}</p>

        <div class="border-t border-gray-400 my-2"></div>
        <p><span class="font-semibold">Tanggal Mulai:</span> {{ \Carbon\Carbon::parse($item->waktu_masuk)->translatedFormat('d F Y') }}</p>

        <div class="border-t border-gray-400 my-2"></div>
        <p><span class="font-semibold">Tanggal Berakhir:</span> {{ \Carbon\Carbon::parse($item->tgl_selesai)->translatedFormat('d F Y') }}</p>

        <div class="border-t border-gray-400 my-2"></div>
        <p><span class="font-semibold">Jenis Kerja Sama:</span> {{ $item->jenis_kerjasama }}</p>

        <div class="border-t border-gray-400 my-2"></div>
        <p><span class="font-semibold">Metode Pengiriman Notifikasi:</span> {{ $item->metode_pengiriman_notifikasi }}</p>

        <div class="border-t border-gray-400 my-2"></div>
        <p><span class="font-semibold">Email:</span> {{ $item->email_user }}</p>

        <div class="border-t border-gray-400 my-2"></div>
        <p>
            <span class="font-semibold">Link Dokumen:</span>
            @if($item->path)
                {{-- Gunakan url storage jika file berada di storage --}}
                <a href="{{ asset('storage/'.$item->path) }}" target="_blank" class="text-blue-600 underline">
                    Lihat Dokumen
                </a>
            @else
                <span class="text-gray-500">Tidak ada dokumen</span>
            @endif
        </p>
    </div>
    @empty
        <p class="text-center text-gray-500">Data mitra belum tersedia</p>
    @endforelse
</div>

</body>
</html>
