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

<body class="font-poppins bg-[#ffffff] h-[5000px]">

    {{-- Header --}}
    <x-navbar></x-navbar>

    {{-- Isi/Section --}}
    <section class="relative min-h-[calc(100vh-80px)] bg-cover bg-center pt-20"
        style="background-image: url('../img/home.png');">

        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-[#ffffff] opacity-100"></div>

        <div class="relative z-10 flex flex-col items-center justify-center min-h-[calc(100vh-80px)] px-5 text-center">
            <img src="../img/Logo1.png" alt="Logo Tengah" class="w-[250px] mb-6">

            <div class="flex flex-col text-white gap-5 text-5xl font-extrabold mb-20"
                style="-webkit-text-stroke: 3px black">
                <h1>SELAMAT DATANG</h1>
                <h1>SISTEM PENDATAAN KERJA SAMA</h1>
                <h1>FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM</h1>
            </div>

            <h1 class="text-white text-5xl font-extrabold mb-4" style="-webkit-text-stroke: 3px black">JALIN KERJA SAMA
                DENGAN KAMI</h1>
            <button
                class="flex items-center gap-3 text-white bg-[linear-gradient(30deg,#222222,#888686)] shadow-lg shadow-black/40 rounded-2xl px-10 py-5 mb-10">
                <img src="../img/ajukan.png" alt="">
                <p class="text-3xl">Ajukan</p>
            </button>
        </div>
    </section>

    <section class="bg-white pt-32">
        {{-- MoU MoA IA --}}
        <div class="relative z-10 flex flex-col items-center justify-center min-h-[calc(100vh-80px)] px-5 text-center">
            <div class="bg-white rounded-xl shadow-xl flex w-full max-w-6xl p-12 mb-16 border-2 border-black">
                <div class="flex-1 text-center">
                    <h2 class="text-5xl font-bold pb-2">118</h2> {{-- nanti di sini koneksikan dengan data yang bener --}}
                    <p class="text-2xl font-bold">MoU</p>
                    <p class="text-sm font-bold">Kerja Sama Internal</p>
                </div>

                <div class="w-px bg-gray-300 mx-4"></div>

                <div class="flex-1 text-center">
                    <h2 class="text-5xl font-bold pb-2">136</h2> {{-- nanti di sini koneksikan dengan data yang bener --}}
                    <p class="text-2xl font-bold">MoA</p>
                    <p class="text-sm font-bold">Kerja Sama Eksternal</p>
                </div>

                <div class="w-px bg-gray-300 mx-4"></div>

                <div class="flex-1 text-center">
                    <h2 class="text-5xl font-bold pb-2">102</h2> {{-- nanti di sini koneksikan dengan data yang bener --}}
                    <p class="text-2xl font-bold">IA</p>
                    <p class="text-sm font-bold">Kerja Sama Eksternal</p>
                </div>
            </div>

            {{-- banyaknya kerja sama --}}
            <div class="flex flex-col gap-10 bg-white mb-16 p-12 w-full max-w-7xl">
                <div class="flex justify-evenly gap-25 text-center">
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-cyan-400 shadow-md mb-3"></div>
                        <h3 class="text-2xl font-bold">4</h3> {{-- nanti di sini koneksikan dengan data yang bener --}}
                        <p class="text-sm font-semibold">Kerja Sama Eksternal</p>
                        <a href="#" class="text-xs underline">Lihat Selengkapnya</a>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-lime-400 shadow-md mb-3"></div>
                        <h3 class="text-2xl font-bold">5</h3> {{-- nanti di sini koneksikan dengan data yang bener --}}
                        <p class="text-sm font-semibold">Kerja Sama Internal</p>
                        <a href="#" class="text-xs underline">Lihat Selengkapnya</a>
                    </div>
                </div>

                <div class="flex justify-evenly gap-32 text-center">
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-red-500 shadow-md mb-3"></div>
                        <h3 class="text-2xl font-bold">331</h3> {{-- nanti di sini koneksikan dengan data yang bener --}}
                        <p class="text-sm font-semibold">Kerja Sama Berlaku</p>
                        <a href="#" class="text-xs underline">Lihat Selengkapnya</a>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-red-500 shadow-md mb-3"></div>
                        <h3 class="text-2xl font-bold">56</h3> {{-- nanti di sini koneksikan dengan data yang bener --}}
                        <p class="text-sm font-semibold">Akan Kadaluarsa</p>
                        <a href="#" class="text-xs underline">Lihat Selengkapnya</a>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-red-500 shadow-md mb-3"></div>
                        <h3 class="text-2xl font-bold">407</h3> {{-- nanti di sini koneksikan dengan data yang bener --}}
                        <p class="text-sm font-semibold">Kadaluarsa</p>
                        <a href="#" class="text-xs underline">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>

            <div
                class="flex justify-center items-center bg-white border-2 border-black shadow-xl rounded-xl shadow-lg mb-16 p-12 w-full max-w-7xl h-[500px]">
                <h1 class="font-bold">NANTI DI SINI TAMBAHIN GRAFIK, MASIH BELUM TAU CARANYA🙏</h1>
            </div>

            <div class="flex flex-col justify-center items-center gap-4 mb-10 p-12 w-full max-w-7xl">
                <h1 class="text-5xl font-bold">Daftar Dokumen Kerja Sama Fakultas MIPA Universitas Udayana</h1>
                <p class="text-xl font-semibold">Bagian ini menyediakan daftar dokumen kerja sama Fakultas MIPA Universitas Udayana</p>
            </div>

            <div class="p-5 overflow-x-auto w-full">
                <table class="w-full border-collapse border border-gray-500 text-sm">
                    <!-- Header -->
                    <thead class="bg-gray-200 text-center font-semibold">
                        <tr>
                            <th class="border border-gray-500 px-3 py-2">No</th>
                            <th class="border border-gray-500 px-3 py-2">Jenis<br>Dokumen</th>
                            <th class="border border-gray-500 px-3 py-2">Judul Kerja Sama</th>
                            <th class="border border-gray-500 px-3 py-2">Tanggal<br>Mulai</th>
                            <th class="border border-gray-500 px-3 py-2">Tanggal<br>Berakhir</th>
                            <th class="border border-gray-500 px-3 py-2">Status</th>
                            <th class="border border-gray-500 px-3 py-2">Detail</th>
                        </tr>
                    </thead>

                    <!-- Body -->
                    <tbody>
                        <tr class="text-center">
                            <td class="border border-gray-500 px-3 py-2">1</td>
                            <td class="border border-gray-500 px-3 py-2 font-bold">IA</td>
                            <td class="border border-gray-500 px-3 py-2 text-left">Implementation Agreement on Adjunct Professor: Webinar Series</td>
                            <td class="border border-gray-500 px-3 py-2">10<br>Desember<br>2025</td>
                            <td class="border border-gray-500 px-3 py-2">10<br>Januari<br>2026</td>
                            <td class="border border-gray-500 px-3 py-2"><span class="font-semibold">Aktif</span></td>
                            <td class="border border-gray-500 px-3 py-2"><button class="bg-sky-400 text-white px-3 py-1 rounded-md">☰</button></td>
                        </tr>
                        
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>

</body>

</html>
