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

            <div class="flex gap-12">
                <div class="flex-1 space-y-4 text-gray-700">
                    <div>
                        <label class="font-semibold">Nama Mitra</label>
                        <input type="text" class="w-full px-4 py-3 rounded-lg bg-white/70 outline-none">
                    </div>

                    <div>
                        <label class="font-semibold">Program Studi</label>
                        <input type="text" class="w-full px-4 py-3 rounded-lg bg-white/70 outline-none">
                    </div>

                    <div>
                        <label class="font-semibold">Jenis Dokumen</label>
                        <select class="w-full px-4 py-3 rounded-lg bg-white/70 outline-none">
                            <option>MoU</option>
                            <option>MoA</option>
                            <option>IA</option>
                        </select>
                    </div>

                    <div>
                        <label class="font-semibold">PIC</label>
                        <input type="text" class="w-full px-4 py-3 rounded-lg bg-white/70 outline-none">
                    </div>

                    <div>
                        <label class="font-semibold">Masa Berlaku</label>
                        <input type="date" class="w-full px-4 py-3 rounded-lg bg-white/70 outline-none">
                    </div>

                    <div>
                        <label class="font-semibold">Status</label>
                        <select class="w-full px-4 py-3 rounded-lg bg-white/70 outline-none">
                            <option>Internal</option>
                            <option>Eksternal</option>
                        </select>
                    </div>

                    <div>
                        <label class="font-semibold">Metode Pengiriman Notifikasi</label>
                        <input type="text" class="w-full px-4 py-3 rounded-lg bg-white/70 outline-none">
                    </div>
                </div>

                <div class="w-[320px] flex flex-col items-center gap-4">
                    <div class="rounded-2xl border-4 border-[#3a536d] p-5 flex flex-col gap-4 text-center">

                        <h3 class="font-bold text-[#3a536d] tracking-wide">
                            Upload Dokumen
                        </h3>

                        <!-- AREA UPLOAD -->
                        <label class="cursor-pointer h-[180px] rounded-xl border-2 border-dashed border-[#3a536d] bg-white/60 flex flex-col items-center justify-center gap-3 hover:bg-white/80 transition">
                            <i class="fa-solid fa-file-arrow-up text-4xl text-[#3a536d]"></i>
                            <p class="text-sm text-[#3a536d] font-semibold">
                                Klik untuk upload dokumen
                            </p>

                            <p class="text-xs text-gray-500">
                                PDF
                            </p>

                            <input type="file" class="hidden" accept=".pdf,.doc,.docx,.jpg,.png">
                        </label>

                    </div>

                    <div class="flex flex-col justify-end gap-4 mt-10">
                        <button class="px-8 py-3 rounded-lg bg-[#3a536d] text-white font-bold hover:bg-[#4b6083]/60">
                            SIMPAN DATA
                        </button>

                        <button class="px-8 py-3 rounded-lg bg-[#3a536d] text-white font-bold hover:bg-[#4b6083]/60">
                            BATAL
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
