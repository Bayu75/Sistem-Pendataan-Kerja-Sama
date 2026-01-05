<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Data Kerja Sama</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    poppins: ['Poppins', 'sans-serif'],
                }
            }
        }
    </script>
</head>

<body class="font-poppins min-h-screen bg-gradient-to-r from-[#70cad4] to-[#9bf8f4]">
    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <x-sidebar />

        <!-- CONTENT -->
        <div class="flex-1 p-8 text-white flex flex-col min-h-screen">
            <div class="flex-1">

                <h1 class="text-4xl font-bold mb-10">DATA KERJA SAMA</h1>

                <!-- SEARCH -->
                <form method="GET" class="flex items-center gap-3 mb-6">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari data..."
                        class="w-full px-5 py-3 rounded-lg text-gray-700 outline-none">

                    <button class="px-4 py-3 bg-[#2c4157] rounded-lg">
                        <i class="fa-solid fa-magnifying-glass text-white"></i>
                    </button>
                </form>

                <!-- TABLE -->
                <div class="overflow-x-auto bg-white rounded-xl shadow-lg">
                    <table class="w-full border-collapse text-center text-gray-700">
                        <thead class="bg-[#2c4157] text-white">
                            <tr>
                                <th class="border px-3 py-3">No</th>
                                <th class="border px-3 py-3">Nama Mitra</th>
                                <th class="border px-3 py-3">Program Studi</th>
                                <th class="border px-3 py-3">Status</th>
                                <th class="border px-3 py-3">Sisa Hari</th>
                                <th class="border px-3 py-3">Detail</th>
                                <th class="border px-3 py-3">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($data as $index => $item)
                                <tr class="hover:bg-gray-100">
                                    <td class="border py-4">
                                        {{ $data->firstItem() + $index }}
                                    </td>

                                    <td class="border py-4">
                                        {{ $item->nama_mitra }}
                                    </td>

                                    <td class="border py-4">
                                        {{ $item->program_studi }}
                                    </td>

                                    <td class="border py-4 font-semibold">
                                        @if ($item->status === 'Aktif')
                                            <span class="text-green-600">{{ $item->status }}</span>
                                        @elseif ($item->status === 'Mendekati Kadaluarsa')
                                            <span class="text-yellow-500">{{ $item->status }}</span>
                                        @else
                                            <span class="text-red-600">{{ $item->status }}</span>
                                        @endif
                                    </td>

                                    <td class="border py-4">
                                        {{ $item->sisa_hari }} hari
                                    </td>

                                    <!-- DETAIL -->
                                    <td class="border-2 border-white py-4">
    <button onclick="openDetail({{ $item->id }})"
        class="underline text-blue-800">
        Klik Detail
    </button>
</td>


                                    <!-- AKSI -->
                                    <td class="border py-4">
                                        <form
                                            action="{{ route('management.destroy', $item->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="px-3 py-2 bg-red-600 text-white rounded-lg text-sm hover:bg-red-700">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-6 text-center text-gray-500">
                                        Data tidak ditemukan
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @foreach ($data as $item)
<div id="modal-{{ $item->id }}"
     class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

    <div class="bg-white text-gray-800 rounded-xl w-full max-w-2xl p-6 relative">
        <button onclick="closeDetail({{ $item->id }})"
            class="absolute top-3 right-4 text-xl font-bold">&times;</button>

        <h2 class="text-2xl font-bold mb-4">Detail Kerja Sama</h2>

        <div class="space-y-2 text-sm">
            <p><b>Nama Mitra:</b> {{ $item->nama_mitra }}</p>
            <p><b>Program Studi:</b> {{ $item->program_studi }}</p>
            <p><b>Judul Kerja Sama:</b> {{ $item->nama_kerjasama }}</p>
            <p><b>Jenis Dokumen:</b> {{ $item->jenis_dokumen }}</p>
            <p><b>PIC:</b> {{ $item->pic }}</p>
            <p><b>Tanggal Mulai:</b> {{ $item->created_at }}</p>
            <p><b>Tanggal Berakhir:</b> {{ $item->tgl_selesai }}</p>
            <p><b>Jenis Kerja Sama:</b> {{ $item->jenis_kerjasama }}</p>
            <p><b>Metode Notifikasi:</b> {{ $item->metode_pengiriman_notifikasi }}</p>
            <p><b>Email:</b> {{ $item->email_user }}</p>

            @if($item->path)
            <p>
                <b>Dokumen:</b>
                <a href="{{ asset('storage/'.$item->path) }}"
                   target="_blank"
                   class="text-blue-600 underline">
                    Lihat Dokumen
                </a>
            </p>
            @endif
        </div>
    </div>
</div>
@endforeach

                </div>

                <!-- PAGINATION -->
                <div class="mt-6">
                    {{ $data->links('pagination::tailwind') }}
                </div>

            </div>
        </div>
    </div>
</body>
<script>
function openDetail(id) {
    document.getElementById('modal-' + id).classList.remove('hidden');
}

function closeDetail(id) {
    document.getElementById('modal-' + id).classList.add('hidden');
}
</script>

</html>
