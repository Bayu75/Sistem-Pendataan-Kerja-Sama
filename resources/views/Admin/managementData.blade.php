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
                <h1 class="text-4xl font-bold mb-10">MANAGEMENT DATA</h1>

                <div class="w-full">
                    <!-- SEARCH -->
                    <form method="GET" action="{{ route('management.data') }}"
                          class="flex mb-4 w-full justify-between">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari no / nama mitra / prodi / status / sisa hari"
                            class="rounded-md w-[95%] p-2 text-xl text-gray-600"
                        >
                        <button class="rounded-md bg-gray-700 w-[4%] text-xl flex justify-center items-center">
                            <img src="../img/search.png" alt="" width="80%">
                        </button>
                    </form>

                    <!-- TABLE -->
                    <table class="w-full text-gray-600">
                        <thead class="text-center">
                            <tr>
                                <th class="border-2 border-white px-3 py-2">No</th>
                                <th class="border-2 border-white px-3 py-2">Nama Mitra</th>
                                <th class="border-2 border-white px-3 py-2">Prodi</th>
                                <th class="border-2 border-white px-3 py-2">Status</th>
                                <th class="border-2 border-white px-3 py-2">Sisa Hari</th>
                                <th class="border-2 border-white px-3 py-2">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="text-center">
                        @forelse($data as $row)
                            <tr>
                                <td class="border-2 border-white px-3 py-3">
                                    {{ $row->id }}
                                </td>

                                <td class="border-2 border-white px-3 py-3">
                                    {{ $row->nama_mitra }}
                                </td>

                                <td class="border-2 border-white px-3 py-3">
                                    {{ $row->program_studi }}
                                </td>

                                <td class="border-2 border-white px-3 py-3 font-semibold
                                    {{ $row->status == 'Aktif' ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $row->status }}
                                </td>

                                <td class="border-2 border-white px-3 py-3">
                                    @if($row->sisa_hari >= 0)
                                        {{ $row->sisa_hari }} Hari
                                    @else
                                        Kadaluarsa
                                    @endif
                                </td>

                                <td class="border-2 border-white px-3 py-3">
                                    <button onclick="openModal({{ $row->id }})">
                                        <img src="../img/aksi.png" alt="aksi">
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="border-2 border-white py-4 text-gray-500">
                                    Tidak ada data
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- FOOTER ACTION -->
            <div class="flex justify-between items-center mt-6">
                <!-- DOWNLOAD CSV -->
                <a href="{{ route('management.export') }}"
                   class="px-6 py-3 bg-gray-700 text-white font-semibold rounded-lg hover:bg-gray-800 transition">
                    Download Data
                </a>

                <!-- PAGINATION -->
                <div class="flex gap-3">
                    {{-- PREV --}}
                    @if ($data->onFirstPage())
                        <button class="w-10 h-10 bg-gray-400 rounded-lg flex items-center justify-center cursor-not-allowed">
                            <i class="fa fa-chevron-left"></i>
                        </button>
                    @else
                        <a href="{{ $data->previousPageUrl() }}"
                           class="w-10 h-10 bg-gray-700 rounded-lg flex items-center justify-center hover:bg-gray-800">
                            <i class="fa fa-chevron-left"></i>
                        </a>
                    @endif

                    {{-- NEXT --}}
                    @if ($data->hasMorePages())
                        <a href="{{ $data->nextPageUrl() }}"
                           class="w-10 h-10 bg-gray-700 rounded-lg flex items-center justify-center hover:bg-gray-800">
                            <i class="fa fa-chevron-right"></i>
                        </a>
                    @else
                        <button class="w-10 h-10 bg-gray-400 rounded-lg flex items-center justify-center cursor-not-allowed">
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL KONFIRMASI HAPUS -->
    <div id="deleteModal"
        class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 w-[350px] text-center text-gray-700">
            <h2 class="text-xl font-bold mb-4">Konfirmasi</h2>
            <p class="mb-6">Apakah data ingin dihapus?</p>

            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')

                <div class="flex justify-center gap-4">
                    <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                        Iya
                    </button>

                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
                        Tidak
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- SCRIPT MODAL -->
    <script>
        function openModal(id) {
            const modal = document.getElementById('deleteModal');
            const form  = document.getElementById('deleteForm');

            form.action = `/management-data/${id}`;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>

</body>
</html>
