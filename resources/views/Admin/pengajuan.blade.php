<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataan Kerja Sama</title>

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
    <x-sidebar></x-sidebar>

    <div class="flex-1 p-8 text-white flex flex-col min-h-screen">
        <div class="flex-1">

            <h1 class="text-4xl font-bold mb-10">PENGAJUAN</h1>

            <!-- SEARCH -->
            <form method="GET"
                  action="/pengajuan"
                  class="flex items-center gap-3 mb-6">

                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari nama mitra / prodi / judul / status..."
                       class="w-full px-5 py-3 rounded-lg text-gray-700 outline-none" />

                <button type="submit"
                        class="px-4 py-3 bg-[#2c4157] rounded-lg">
                    <i class="fa-solid fa-magnifying-glass text-white"></i>
                </button>
            </form>

            <!-- TABLE -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse text-center text-gray-700">
                    <thead>
                    <tr class="font-bold">
                        <th class="border-2 border-white px-3 py-2">No</th>
                        <th class="border-2 border-white px-3 py-2">Nama Mitra</th>
                        <th class="border-2 border-white px-3 py-2">Prodi</th>
                        <th class="border-2 border-white px-3 py-2">Status</th>
                        <th class="border-2 border-white px-3 py-2">Detail</th>
                        <th class="border-2 border-white px-3 py-2">Aksi</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse ($data->where('status', 'pending') as $i => $item)
                        <tr>
                            <td class="border-2 border-white py-4">{{ $i + 1 }}</td>

                            <td class="border-2 border-white py-4">
                                {{ $item->nama_mitra ?? '-' }}
                            </td>

                            <td class="border-2 border-white py-4">
                                {{ $item->program_studi ?? '-' }}
                            </td>

                            <td class="border-2 border-white py-4 font-bold"
                                id="status-{{ $item->id }}">
                                {{ strtoupper($item->status) }}
                            </td>

                            <td class="border-2 border-white py-4">
                                <button onclick="openDetail({{ $item->id }})"
                                        class="underline text-blue-800">
                                    Klik Detail
                                </button>
                            </td>

                            <td class="border-2 border-white py-4 space-x-2">
                                <button onclick="updateStatus({{ $item->id }}, 'acc')"
                                        class="px-3 py-1 bg-green-600 text-white rounded">
                                    ✔
                                </button>

                                <button onclick="updateStatus({{ $item->id }}, 'ditolak')"
                                        class="px-3 py-1 bg-red-600 text-white rounded">
                                    ✖
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6"
                                class="border-2 border-white py-6 font-semibold">
                                Data tidak ditemukan
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <!-- MODAL DETAIL -->
            @foreach ($data as $item)
                <div id="modal-{{ $item->id }}"
                     class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

                    <div class="bg-white text-gray-800 rounded-xl w-full max-w-2xl p-6 relative">
                        <button onclick="closeDetail({{ $item->id }})"
                                class="absolute top-3 right-4 text-xl font-bold">&times;</button>

                        <h2 class="text-2xl font-bold mb-4">Detail Pengajuan</h2>

                        <div class="space-y-2 text-sm">
                            <p><b>Nama:</b> {{ $item->nama_mitra }}</p>
                            <p><b>Program Studi:</b> {{ $item->program_studi }}</p>
                            <p><b>Judul Kerja Sama:</b> {{ $item->nama_kerjasama }}</p>
                            <p><b>Jenis Dokumen:</b> {{ $item->jenis_dokumen }}</p>
                            <p><b>PIC:</b> {{ $item->pic }}</p>
                            <p><b>Tanggal Mulai:</b> {{ $item->created_at }}</p>
                            <p><b>Tanggal Berakhir:</b> {{ $item->tgl_selesai }}</p>
                            <p><b>Jenis Kerja Sama:</b> {{ $item->jenis_kerjasama }}</p>
                            <p><b>Metode Notifikasi:</b> {{ $item->metode_pengiriman_notifikasi }}</p>
                            <p><b>Email:</b> {{ $item->email_user }}</p>

                            @if ($item->path)
                                <p>
                                    <b>Dokumen:</b>
                                    <a href="{{ asset('storage/' . $item->path) }}"
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
    </div>
</div>

<script>
function openDetail(id) {
    document.getElementById('modal-' + id).classList.remove('hidden');
}

function closeDetail(id) {
    document.getElementById('modal-' + id).classList.add('hidden');
}

function updateStatus(id, status) {
    fetch(`/pengajuan/${id}/status`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ status })
    })
    .then(res => res.json())
    .then(() => {
        document.getElementById('status-' + id).innerText = status.toUpperCase();
        alert('Status berhasil diperbarui');
    });
}
</script>

</body>
</html>
