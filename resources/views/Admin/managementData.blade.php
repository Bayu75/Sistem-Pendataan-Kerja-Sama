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
                    <div class="flex mb-4 w-full justify-between">
                        <input type="search..." class="rounded-md w-[95%] p-2 text-xl text-gray-600">
                        <button class="rounded-md bg-gray-700 w-[4%] text-xl mb flex justify-center items-center"><img src="../img/search.png" alt="" width="80%"></button>
                    </div>

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
                            <tr>
                                <td class="border-2 border-white px-3 py-3">1</td>
                                <td class="border-2 border-white px-3 py-3">xyz</td>
                                <td class="border-2 border-white px-3 py-3">Kimia</td>
                                <td class="border-2 border-white px-3 py-3">Aktif</td>
                                <td class="border-2 border-white px-3 py-3">120 Hari</td>
                                <td class="border-2 border-white px-3 py-3"><button><img src="../img/aksi.png" alt=""></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- FOOTER ACTION -->
            <div class="flex justify-between items-center mt-6">
                <!-- DOWNLOAD -->
                <button class="px-6 py-3 bg-gray-700 text-white font-semibold rounded-lg hover:bg-gray-800 transition">
                    Download Data
                </button>

                <!-- PAGINATION -->
                <div class="flex gap-3">
                    <button class="w-10 h-10 bg-gray-700 rounded-lg flex items-center justify-center hover:bg-gray-800">
                        <i class="fa fa-chevron-left"></i>
                    </button>

                    <button class="w-10 h-10 bg-gray-700 rounded-lg flex items-center justify-center hover:bg-gray-800">
                        <i class="fa fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
