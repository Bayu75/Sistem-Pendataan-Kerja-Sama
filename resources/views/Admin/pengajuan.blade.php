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
                <div class="flex items-center gap-3 mb-6">
                    <input type="text" class="w-full px-5 py-3 rounded-lg text-gray-700 outline-none" />
                    <button class="px-4 py-3 bg-[#2c4157] rounded-lg">
                        <i class="fa-solid fa-magnifying-glass text-white"></i>
                    </button>
                </div>

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
                            <tr>
                                <td class="border-2 border-white py-6">1</td>
                                <td class="border-2 border-white py-6">abc</td>
                                <td class="border-2 border-white py-6">infor</td>
                                <td class="border-2 border-white py-6">Pending</td>
                                <td class="border-2 border-white py-6">*klik detail</td>
                                <td class="border-2 border-white py-6">
                                    <button>*silang</button>
                                    <button>*centang</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
