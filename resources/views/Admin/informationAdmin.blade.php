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
                <h1 class="text-4xl font-bold mb-10">INFORMATION</h1>

                <!-- SEARCH -->
                <!-- SEARCH -->
<form method="GET" action="{{ url('/informationAdmin') }}" class="flex items-center gap-3 mb-6">
    <input type="text"
           name="search"
           value="{{ $search ?? '' }}"
           placeholder="Cari judul / deskripsi / ID..."
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
                                <th class="border-2 border-white py-4">No.</th>
                                <th class="border-2 border-white py-4">Judul</th>
                                <th class="border-2 border-white py-4">tanggal</th>
                                <th class="border-2 border-white py-4">Deskripsi</th>
                                <th class="border-2 border-white py-4">Aksi</th>
                            </tr>
                        </thead>

<tbody>
@foreach ($data as $i => $item)
<tr>
    <td class="border-2 border-white py-6">
        {{ $item->id }}
    </td>

    <td class="border-2 border-white py-6">
        {{ $item->nama_kerjasama }}
    </td>

    <td class="border-2 border-white py-6">
        {{ \Carbon\Carbon::parse($item->waktu_masuk)->format('Y-m-d') }}
    </td>

    <td class="border-2 border-white py-6 text-left px-4">
        {{ $item->deskripsi }}
    </td>

    <td class="border-2 border-white py-6">
        <form action="/admin/information/{{ $item->dokumentasi_id }}" method="POST"
              onsubmit="return confirm('Yakin hapus data ini?')">
            @csrf
            @method('DELETE')
            <button class="text-red-600 font-bold hover:underline">
                Hapus
            </button>
        </form>
    </td>
</tr>
@endforeach
</tbody>

                    </table>
                </div>
            </div>

<div class="flex justify-end items-center mt-6">
    <button onclick="openModal()"
        class="px-6 py-3 bg-gray-700 text-white font-semibold rounded-lg hover:bg-gray-800 transition">
        Tambah Data
    </button>
</div>
<!-- MODAL TAMBAH DESKRIPSI -->
<div id="modalTambah"
     class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

    <div class="bg-white text-gray-800 rounded-xl w-full max-w-lg p-6 relative">
        <button onclick="closeModal()"
            class="absolute top-3 right-4 text-xl font-bold">&times;</button>

        <h2 class="text-2xl font-bold mb-4">Tambah / Update Deskripsi</h2>

        <form action="{{ route('admin.information.updateDeskripsi') }}" method="POST">
            @csrf

            <!-- PILIH DOKUMENTASI -->
            <div class="mb-4">
                <label class="font-semibold">Pilih Judul Kerja Sama</label>
                <select name="dokumentasi_id"
                        class="w-full border rounded-lg p-2 mt-1" required>
                    <option value="">-- Pilih --</option>
                    @foreach ($data as $item)
                        <option value="{{ $item->dokumentasi_id }}">
                            {{ $item->nama_kerjasama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- INPUT DESKRIPSI -->
            <div class="mb-4">
                <label class="font-semibold">Deskripsi</label>
                <textarea name="deskripsi"
                          class="w-full border rounded-lg p-2 mt-1"
                          rows="4"
                          placeholder="Masukkan deskripsi baru..."
                          required></textarea>
            </div>

            <div class="flex justify-end gap-3">
                <button type="button"
                        onclick="closeModal()"
                        class="px-4 py-2 bg-gray-400 rounded-lg text-white">
                    Batal
                </button>

                <button type="submit"
                        class="px-4 py-2 bg-blue-600 rounded-lg text-white">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

        </div>
    </div>
    <script>
function openModal() {
    document.getElementById('modalTambah').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('modalTambah').classList.add('hidden');
}
</script>

</body>
