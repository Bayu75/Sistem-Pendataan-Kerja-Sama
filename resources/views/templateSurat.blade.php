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

<body class="font-poppins bg-[#ffffff] min-h-screen pt-20">
    
    <x-navbar></x-navbar>
    
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10 mb-20">
        <div class="bg-white p-8 shadow-sm border border-gray-100 rounded-sm min-h-[200px]">
        
            <h2 class="text-xl font-bold text-gray-800 mb-8 border-b pb-4">
                Template Kerjasama
            </h2>

            <div class="space-y-4">
                <a href="{{ asset('files/Contoh-MoU-Kerjasama-FMIPA UNUD.docx') }}" 
                download="Template_MoU_Industri.docx" 
                class="flex items-center text-[#1e40af] hover:text-blue-800 transition-colors group">
                    <i class="fa-solid fa-download mr-3 text-sm"></i>
                    <span class="text-[15px] group-hover:underline">Template MoU FMIPA</span>
                </a>

                <a href="{{ asset('files/Contoh-MoA-Kerjasama-FMIPA UNUD.docx') }}" 
                download="Template_MoA_FMIPA.docx" 
                class="flex items-center text-[#1e40af] hover:text-blue-800 transition-colors group">
                    <i class="fa-solid fa-download mr-3 text-sm"></i>
                    <span class="text-[15px] group-hover:underline">Template MoA FMIPA</span>
                </a>

                <a href="{{ asset('files/Contoh-IA-Kerjasama-FMIPA UNUD.docx') }}" 
                download="Template_IA_FMIPA.docx" 
                class="flex items-center text-[#1e40af] hover:text-blue-800 transition-colors group">
                    <i class="fa-solid fa-download mr-3 text-sm"></i>
                    <span class="text-[15px] group-hover:underline">Template IA FMIPA</span>
                </a>
            </div>
        </div>
    </main>


    <section class="bg-gradient-to-b from-transparent via-transparent to-[rgba(97,96,96)] opacity-100">
        <div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- MAP -->
            <div class="w-full h-[300px] lg:h-full rounded-lg overflow-hidden shadow">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3315.5369158529993!2d115.17005219130466!3d-8.799212466773016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd244bc3acab8d9%3A0x7fba454d24527b74!2sFakultas%20Matematika%20dan%20Ilmu%20Pengetahuan%20Alam!5e0!3m2!1sid!2sid!4v1766414608328!5m2!1sid!2sid"
                    class="w-full h-full border-0" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!-- INFO -->
            <div class="text-sm text-gray-800 space-y-3">
                <h3 class="font-bold text-base">
                    Fakultas Matematika dan Ilmu Pengetahuan Alam<br>
                    Universitas Udayana
                </h3>

                <p><span class="font-semibold">Contact Us</span><br>Jl. Raya Kampus Unud No.9, Jimbaran, Kec. Kuta
                    Sel., Kabupaten Badung, Bali 80361</p>

                <p>Telp.: (+62) 361 703137<br>Fax: (+62) 361 70574291250</p>

                <p>WA Blast for Transaksi: (+62) 85932478983 dan (+62) 8135 998861</p>

                <p>Email: <a href="mailto:fmipa@unud.ac.id" class="text-blue-700 underline">fmipa@unud.ac.id</a></p>

                <p class="font-semibold">© 2022 USDI – UNIVERSITAS UDAYANA</p>
                <!-- SOCIAL -->
                <div>
                    <p class="font-semibold mb-2">Follow Us</p>
                    <div class="flex gap-4 text-lg">
                        <a href="#" class="hover:text-black"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="hover:text-black"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="hover:text-black"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="hover:text-black"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="hover:text-black"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="hover:text-black"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section> 

</body>