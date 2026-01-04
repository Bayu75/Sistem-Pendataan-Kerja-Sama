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

        <!-- CONTENT -->
        <div class="flex-1 p-8 text-white">
            <h1 class="text-4xl font-bold mb-16">DASHBOARD</h1>

            <!-- BOX -->
            <div class="flex justify-between px-12 mb-6">

                <!-- JUMLAH MITRA -->
                <div class="w-[250px] h-[250px] bg-white border-4 border-[#3a536d] rounded-lg flex flex-col items-center justify-between cursor-pointer text-center">

                    <p class="px-2 text-xl font-extrabold italic bg-gradient-to-b from-sky-400 via-sky-500 to-sky-700 bg-clip-text text-transparent">
                        JUMLAH
                    </p>

                    <!-- grafik -->
                    <div>

                    </div>

                    <p class="text-xl font-extrabold italic bg-gradient-to-b from-sky-400 via-sky-500 to-sky-700 bg-clip-text text-transparent">
                        MITRA
                    </p>
                </div>

                <!-- STATUS DOKUMEN -->
                <div class="w-[250px] h-[250px] bg-white border-4 border-[#3a536d] rounded-lg flex flex-col items-center justify-between cursor-pointer text-center">
                    <p class="px-1 text-xl font-extrabold italic bg-gradient-to-b from-sky-400 via-sky-500 to-sky-700 bg-clip-text text-transparent">
                        STATUS DOKUMEN
                    </p>

                    <div></div>

                    <p></p>
                </div>

            </div>

            <!-- PENGUMUMAN -->
            <div class="mx-12 h-[250px] flex flex-col items-center justify-center text-center bg-white/30 border-2 border-white rounded-2xl text-base font-medium text-black">
                <p>Tidak ada data</p>
                <p>Silahkan pilih berdasarkan grafik di atas</p>
            </div>

        </div>
    </div>

</body>

</html>
