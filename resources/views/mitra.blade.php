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

<body class="font-poppins bg-white pt-20">
<x-navbar></x-navbar>

<div class="max-w-7xl mx-auto px-6 py-10">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
        <h1 class="text-4xl font-bold">Daftar Mitra Kerja Sama</h1>
        
        <form action="{{ route('mitra.index') }}" method="GET" class="flex gap-2">
            <input 
                type="text" 
                name="search" 
                value="{{ $search }}" 
                placeholder="Cari mitra atau dokumen..." 
                class="border border-gray-300 rounded-lg px-4 py-2 w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-sky-500"
            >
            <button type="submit" class="bg-sky-500 text-white px-4 py-2 rounded-lg hover:bg-sky-600 transition">
                <i class="fa fa-search"></i> Cari
            </button>
            @if($search)
                <a href="{{ route('mitra.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                    Reset
                </a>
            @endif
        </form>
    </div>


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
