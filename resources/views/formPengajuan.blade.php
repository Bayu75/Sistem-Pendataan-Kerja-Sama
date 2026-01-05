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

<body class="font-poppins bg-[#ffffff] pt-20 pt-20 flex flex-col min-h-screen">
    <main class="flex-grow flex justify-center items-center py-12 px-4">
        <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl border border-gray-100 p-8 md:p-12">
            
            <div class="text-center mb-10">
                <img src="../img/Logo UNUD.png" alt="Logo" class="w-20 mx-auto mb-4">
                <h1 class="text-3xl font-extrabold tracking-tight">SELAMAT DATANG</h1>
                <p class="text-gray-500 font-semibold tracking-widest uppercase text-sm">Sistem Pendataan dan Kerjasama</p>
            </div>

            <form action="#" method="POST" class="space-y-8">
                
                <div>
                    <h2 class="text-lg font-bold mb-4 border-b-2 border-sky-500 inline-block">Data Pihak Pengaju</h2>
                    <div class="grid grid-cols-1 gap-4">
                        <input type="text" placeholder="Nama Mitra" class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 outline-none">
                        <input type="text" placeholder="Program Studi" class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 outline-none">
                        <input type="text" placeholder="Nama Kerja Sama" class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 outline-none">
                        <input type="text" placeholder="Jenis Dokumen" class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 outline-none">
                        <input type="text" placeholder="PIC" class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 outline-none">
                        <input type="text" placeholder="Masa Belaku (format : Bulan/Tanggal/Tahun)" class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 outline-none">
                        <input type="text" placeholder="Jenis Kerja Sama" class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 outline-none">
                        <input type="text" placeholder="Alamat Email" class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 outline-none">
                        <input type="text" placeholder="Deskripsi" class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 outline-none">
                        <input type="text" placeholder="PIC" class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-500 outline-none">
                        <input type="file" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100 p-2 bg-gray-50 border border-dashed border-gray-300 rounded-lg">
                    </div>
                </div>
                
                <div class="pt-6">
                    <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-4 rounded-xl shadow-lg transition duration-300 transform hover:-translate-y-1">
                        AJUKAN SEKARANG
                    </button>
                </div>
            </form>
        </div>
    </main>



    <footer class="bg-gray-100 border-t mt-auto">
        <div class="max-w-7xl mx-auto px-6 py-6">
            <div class="flex flex-col md:flex-row items-center md:items-start justify-between gap-6">

                <!-- Logo -->
                <div class="flex-shrink-0">
                    <img src="../img/Logo UNUD.png" alt="Universitas Udayana" class="w-20">
                </div>

                <!-- Deskripsi -->
                <div class="text-center md:text-left flex-1">
                    <p class="text-sm text-gray-700 font-medium">
                        Platform yang menghubungkan Fakultas Matematika dan Ilmu Pengetahuan Alam
                        Universitas Udayana dengan mitra eksternal.
                    </p>
                    <p class="text-sm text-gray-700">
                        Mengelola dokumen kemitraan, memantau kemajuan, dan
                        mengkoordinasikannya dengan seluruh program studi fakultas.
                    </p>

                    <p class="mt-3 text-xs text-gray-600 font-semibold">
                        Universitas Udayana
                    </p>
                    <p class="text-xs text-gray-600">
                        © 2022 USDI – UNIVERSITAS UDAYANA
                    </p>
                </div>

                <!-- Social Media -->
                <div class="text-center md:text-right">
                    <p class="text-sm font-semibold mb-2">Follow Us</p>
                    <div class="flex justify-center md:justify-end space-x-3">
                        <a href="#" class="text-gray-600 hover:text-black">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-black">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-black">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-black">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </footer>
</body>
