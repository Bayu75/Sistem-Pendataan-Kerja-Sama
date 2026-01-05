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

<body class="font-poppins bg-[#ffffff] pt-20">
    
    <x-navbar></x-navbar>

    <div class="max-w-7xl mx-auto px-6 py-12">
                <div class="flex flex-col justify-center items-center gap-4 p-12 w-full max-w-7xl">
                    <h1 class="text-5xl font-bold">DOKUMENTASI DAN INFORMASI</h1>
                    <p class="text-xl font-semibold">Dokumentasi kegiatan terkait perjanjian kerja sama</p>
                </div>

				<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
				@foreach ($dokumen as $item)
                
				<article class="bg-gradient-to-b from-gray-200 to-gray-400 rounded-xl p-4 flex flex-col shadow-md">
				    
				    <img src="{{ asset('img/Artikel 1.png') }}" class="rounded-lg mb-2 h-40 object-cover">

				    <p class="text-[15px] text-black mb-2">
				        {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}
				    </p>

				    <h3 class="font-semibold text-xl mb-3 leading-snug">
				        {{ $item->nama_kerjasama }}
				    </h3>

				    <button
				        onclick="openModal({{ $item->id }})"
				        class="mt-auto bg-sky-500 text-white text-lg px-3 py-1 rounded">
				        Selengkapnya
				    </button>
				</article>
				@endforeach
				</div>

				</div> <!-- penutup grid -->

				{{-- TAMBAHKAN MODAL DI SINI --}}
				@foreach ($dokumen as $item)
				<div id="modal-{{ $item->id }}"
						class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

						<div class="bg-white rounded-xl w-full max-w-2xl p-6 relative">
								<button onclick="closeModal({{ $item->id }})"
										class="absolute top-3 right-4 text-xl font-bold">&times;</button>

								<h2 class="text-2xl font-bold mb-4">Detail Kerja Sama</h2>

								<div class="space-y-4 text-sm text-gray-800">
										<p>
												<span class="font-semibold">Judul:</span><br>
												{{ $item->nama_kerjasama }}
										</p>

										<p>
												<span class="font-semibold">Deskripsi:</span><br>
												{{ $item->deskripsi ?? 'Tidak ada deskripsi.' }}
										</p>
								</div>

						</div>
				</div>
				@endforeach

                
                <div class="flex justify-center mt-6">
					<nav class="inline-flex items-center gap-1 text-sm">

						<a href="{{ $dokumen->url(1) }}"
							class="px-3 py-1 border rounded hover:bg-gray-200">&laquo;</a>

						<a href="{{ $dokumen->previousPageUrl() ?? '#' }}"
							class="px-3 py-1 border rounded hover:bg-gray-200">&lsaquo;</a>

						@for ($i = 1; $i <= $dokumen->lastPage(); $i++)
							@if ($i <= 2 || $i > $dokumen->lastPage()-2 || abs($i - $dokumen->currentPage()) <= 1)
								<a href="{{ $dokumen->url($i) }}"
									class="px-3 py-1 border rounded
									{{ $dokumen->currentPage()==$i ? 'bg-sky-400 text-white' : 'hover:bg-gray-200' }}">
									{{ $i }}
								</a>
							@elseif ($i == 3 || $i == $dokumen->lastPage()-2)
								<span class="px-2">...</span>
							@endif
						@endfor

						<a href="{{ $dokumen->nextPageUrl() ?? '#' }}"
							class="px-3 py-1 border rounded hover:bg-gray-200">&rsaquo;</a>

						<a href="{{ $dokumen->url($dokumen->lastPage()) }}"
							class="px-3 py-1 border rounded hover:bg-gray-200">&raquo;</a>
					</nav>
				</div>
    </div>

    <section class="bg-gradient-to-b from-transparent via-transparent to-[rgba(97,96,96)] opacity-100 mt-20">
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

                <p class="font-semibold">© 2022 USDI UNIVERSITAS UDAYANA</p>
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
    <script>
    function openModal(id) {
        document.getElementById('modal-' + id).classList.remove('hidden');
    }
    function closeModal(id) {
        document.getElementById('modal-' + id).classList.add('hidden');
    }
    </script>

</body>