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

        {{-- SIDEBAR --}}
        <x-sidebar></x-sidebar>

        <div class="flex flex-col justify-between gap-5 p-8 text-white w-full">
            <h1 class="text-4xl text-white font-extrabold tracking-widest mb-3">IDENTITAS MITRA</h1>

            {{-- ERROR / SUCCESS --}}
            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded mb-4">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- FORM --}}
            <form method="POST" 
                enctype="multipart/form-data"
                class="flex gap-12">

                @csrf
                <div class="flex-1 space-y-4 text-gray-700">
                    <div>
                        <label class="font-semibold">Nama Mitra</label>
                        <input type="text" name="nama_mitra" class="w-full px-4 py-3 rounded-lg bg-white/70 outline-none" required>
                    </div>

                    <div>
                        <label class="font-semibold">Program Studi</label>
                        <input type="text" name="program_studi" class="w-full px-4 py-3 rounded-lg bg-white/70 outline-none" required>
                    </div>

                    <div>
                        <label class="font-semibold">Nama Kerja Sama</label>
                        <input type="text" name="nama_kerjasama" class="w-full px-4 py-3 rounded-lg bg-white/70 outline-none" required>
                    </div>

                    <div>
                        <label class="font-semibold">Jenis Dokumen</label>
                        <select name="jenis_dokumen" class="w-full px-4 py-3 rounded-lg bg-white/70 outline-none" required>
                            <option>MoU</option>
                            <option>MoA</option>
                            <option>IA</option>
                        </select>
                    </div>

                    <div>
                        <label class="font-semibold">PIC</label>
                        <input type="text" name="pic" class="w-full px-4 py-3 rounded-lg bg-white/70 outline-none" required>
                    </div>

                    <div>
                        <label class="font-semibold">Masa Berlaku (Format: Bulan/Tanggal/Tahun)</label>
                        <input type="date" name="masa_berlaku" class="w-full px-4 py-3 rounded-lg bg-white/70 outline-none" required>
                    </div>

                    <div>
                        <label class="font-semibold">Jenis Kerjasama</label>
                        <select name="jenis_kerjasama" class="w-full px-4 py-3 rounded-lg bg-white/70 outline-none" required>
                            <option>Internal</option>
                            <option>Eksternal</option>
                        </select>
                    </div>

                    <div>
                        <label class="font-semibold">Metode Pengiriman Notifikasi</label>
                        <select name="metode_pengiriman_notifikasi" class="w-full px-4 py-3 rounded-lg bg-white/70 outline-none" required>
                            <option>Email</option>
                        </select>
                    </div>

                    <div>
                        <label class="font-semibold">Masukkan Alamat Email</label>
                        <input type="email" name="email_user" class="w-full px-4 py-3 rounded-lg bg-white/70 outline-none" required>
                    </div>
                </div>

                <div class="w-[320px] flex flex-col items-center gap-4">
                    <div class="rounded-2xl border-4 border-[#3a536d] p-5 flex flex-col gap-4 text-center">

                        <h3 class="font-bold text-[#3a536d] tracking-wide">
                            Upload Dokumen
                        </h3>

                        <!-- AREA UPLOAD -->
                        <label id="uploadLabel" class="cursor-pointer h-[180px] rounded-xl border-2 border-dashed border-[#3a536d] bg-white/60 flex flex-col items-center justify-center gap-3 hover:bg-white/80 transition">
                            <i id="uploadIcon" class="fa-solid fa-file-arrow-up text-4xl text-[#3a536d]"></i>
                            <p id="uploadText" class="text-sm text-[#3a536d] font-semibold">
                                Klik untuk upload dokumen
                            </p>
                            <p class="text-xs text-gray-500">
                                PDF
                            </p>
                            <input id="dokumen" type="file" name="dokumen" class="hidden" accept=".pdf" required>
                        </label>

                    </div>

                    <div class="flex flex-col justify-end gap-4 mt-10 w-full">
                        <button type="submit" class="px-8 py-3 rounded-lg bg-[#3a536d] text-white font-bold hover:bg-[#4b6083]/60 w-full">
                            SIMPAN DATA
                        </button>

                        <a href="{{ route('dashboardAdmin') }}" class="px-8 py-3 rounded-lg bg-[#3a536d] text-white font-bold hover:bg-[#4b6083]/60 text-center block">
                            BATAL
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>