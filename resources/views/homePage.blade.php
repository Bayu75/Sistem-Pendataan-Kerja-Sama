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

<body class="font-poppins bg-[#ffffff]">

    {{-- Header --}}
    <x-navbar></x-navbar>

    {{-- Isi/Section --}}
    <section class="relative min-h-[calc(100vh-80px)] bg-cover bg-center pt-20"
        style="background-image: url('../img/home.png');">

        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-[#ffffff] opacity-100"></div>

        <div class="relative z-10 flex flex-col items-center justify-center min-h-[calc(100vh-80px)] px-5 text-center">
            <img src="../img/Logo1.png" alt="Logo Tengah" class="w-[250px] mb-6">

            <div class="flex flex-col text-white gap-3 sm:gap-4 lg:gap-5 text-3xl sm:text-4xl lg:text-5xl font-extrabold mb-20" style="-webkit-text-stroke: 3px black">
                <h1>SELAMAT DATANG</h1>
                <h1>SISTEM PENDATAAN KERJA SAMA</h1>
                <h1>FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM</h1>
            </div>

            <h1 class="text-white gap-3 sm:gap-4 lg:gap-5 text-3xl sm:text-4xl lg:text-5xl font-extrabold mb-4" style="-webkit-text-stroke: 3px black">JALIN KERJA SAMA DENGAN KAMI</h1>
            <button class="flex items-center gap-3 text-white bg-[linear-gradient(30deg,#222222,#888686)] shadow-lg shadow-black/40 rounded-2xl px-10 py-5 mb-10">
                <img src="../img/ajukan.png" alt="">
                <p class="text-sm sm:text-2xl lg:text-3xl">Ajukan</p>
            </button>
        </div>
    </section>

    <section class="bg-white pt-32">
        {{-- MoU MoA IA --}}
        <div class="relative z-10 flex flex-col items-center justify-center min-h-[calc(100vh-80px)] px-5 text-center">
            <div class="bg-white rounded-xl shadow-xl flex w-full max-w-6xl p-12 mb-16 border-2 border-black">
                <div class="flex-1 text-center">
                    <h2 class="text-5xl font-bold pb-2">{{ $mouInternal }}</h2> {{-- nanti di sini koneksikan dengan data yang bener --}}
                    <p class="text-2xl font-bold">MoU</p>
                    <p class="text-sm font-bold">Kerja Sama Internal</p>
                </div>

                <div class="w-px bg-gray-300 mx-4"></div>

                <div class="flex-1 text-center">
                    <h2 class="text-5xl font-bold pb-2">{{ $moaEksternal }}</h2> {{-- nanti di sini koneksikan dengan data yang bener --}}
                    <p class="text-2xl font-bold">MoA</p>
                    <p class="text-sm font-bold">Kerja Sama Eksternal</p>
                </div>

                <div class="w-px bg-gray-300 mx-4"></div>

                <div class="flex-1 text-center">
                    <h2 class="text-5xl font-bold pb-2">{{ $iaEksternal }}</h2> {{-- nanti di sini koneksikan dengan data yang bener --}}
                    <p class="text-2xl font-bold">IA</p>
                    <p class="text-sm font-bold">Kerja Sama Eksternal</p>
                </div>
            </div>

            {{-- banyaknya kerja sama --}}
            <div class="flex flex-col gap-10 bg-white mb-16 p-12 w-full max-w-7xl">
                <div class="flex justify-evenly gap-25 text-center">
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-cyan-400 shadow-md mb-3"></div>
                        <h3 class="text-2xl font-bold">{{ $kerjasamaEksternal }}</h3> {{-- nanti di sini koneksikan dengan data yang bener --}}
                        <p class="text-sm font-semibold">Kerja Sama Eksternal</p>
                        <a href="#" class="text-xs underline">Lihat Selengkapnya</a>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-lime-400 shadow-md mb-3"></div>
                        <h3 class="text-2xl font-bold">{{ $kerjasamaInternal }}</h3> {{-- nanti di sini koneksikan dengan data yang bener --}}
                        <p class="text-sm font-semibold">Kerja Sama Internal</p>
                        <a href="#" class="text-xs underline">Lihat Selengkapnya</a>
                    </div>
                </div>

                <div class="flex justify-evenly gap-32 text-center">
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-red-500 shadow-md mb-3"></div>
                        <h3 class="text-2xl font-bold">{{ $aktif }}</h3> {{-- nanti di sini koneksikan dengan data yang bener --}}
                        <p class="text-sm font-semibold">Kerja Sama Berlaku</p>
                        <a href="#" class="text-xs underline">Lihat Selengkapnya</a>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-red-500 shadow-md mb-3"></div>
                        <h3 class="text-2xl font-bold">{{ $mendekatiKadaluarsa }}</h3> {{-- nanti di sini koneksikan dengan data yang bener --}}
                        <p class="text-sm font-semibold">Akan Kadaluarsa</p>
                        <a href="#" class="text-xs underline">Lihat Selengkapnya</a>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-red-500 shadow-md mb-3"></div>
                        <h3 class="text-2xl font-bold">{{ $kadaluarsa }}</h3> {{-- nanti di sini koneksikan dengan data yang bener --}}
                        <p class="text-sm font-semibold">Kadaluarsa</p>
                        <a href="#" class="text-xs underline">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>

			<div
				class="flex justify-center items-center bg-white border-2 border-black shadow-xl rounded-xl shadow-lg mb-16 p-12 w-full max-w-7xl h-[500px]">

				<div class="grid grid-cols-1 lg:grid-cols-2 gap-10 w-full h-full">
					<!-- DONUT -->
					<div class="flex flex-col justify-center items-center">
						<h2 class="font-bold text-lg mb-4">Jumlah Dokumen per Jenis</h2>
						<canvas id="donutChart" class="max-h-[300px]"></canvas>
					</div>

					<!-- BAR -->
					<div class="flex flex-col justify-center items-center">
						<h2 class="font-bold text-lg mb-4">Jumlah Dokumen per Status</h2>
						<canvas id="barChart" class="max-h-[300px]"></canvas>
					</div>
				</div>

				<!-- SCRIPT -->
				<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
				<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

				<script>
					Chart.register(ChartDataLabels);

					/* DATA DARI CONTROLLER */
					const jenisLabels = {!! json_encode($grafikJenisDokumen->keys()) !!};
					const jenisData   = {!! json_encode($grafikJenisDokumen->values()) !!};

					const statusLabels = {!! json_encode($grafikStatusDokumen->keys()) !!};
					const statusData   = {!! json_encode($grafikStatusDokumen->values()) !!};

					/* TOTAL KERJA SAMA */
					const totalKerjasama = jenisData.reduce((a, b) => a + b, 0);

					/* PLUGIN TEXT TENGAH DONUT */
					const centerTextPlugin = {
						id: 'centerText',
						beforeDraw(chart) {
							const { ctx, width, height } = chart;
							ctx.restore();

							const fontSize = (height / 150).toFixed(2);
							ctx.font = `bold ${fontSize}em Poppins`;
							ctx.textBaseline = 'middle';
							ctx.fillStyle = '#000';

							const text = totalKerjasama;
							const textX = Math.round((width - ctx.measureText(text).width) / 2);
							const textY = height / 2;

							ctx.fillText(text, textX, textY - 10);

							ctx.font = 'bold 14px Poppins';
							ctx.fillText('Total', width / 2 - 18, textY + 15);

							ctx.save();
						}
					};

					/* DONUT CHART */
					new Chart(document.getElementById('donutChart'), {
						type: 'doughnut',
						plugins: [centerTextPlugin],
						data: {
							labels: jenisLabels,
							datasets: [{
								data: jenisData,
								backgroundColor: [
									'#22c55e',
									'#3b82f6',
									'#f97316',
									'#a855f7'
								],
								borderWidth: 2
							}]
						},
						options: {
							responsive: true,
							cutout: '65%',
							plugins: {
								legend: {
									position: 'bottom'
								},
								datalabels: {
									color: '#fff',
									font: {
										weight: 'bold',
										size: 16
									},
									formatter: (value) => value
								}
							}
						}
					});

					/* BAR CHART */
					new Chart(document.getElementById('barChart'), {
						type: 'bar',
						data: {
							labels: statusLabels,
							datasets: [{
								data: statusData,
								backgroundColor: [
									'#22c55e',
									'#facc15',
									'#ef4444'
								]
							}]
						},
						options: {
							responsive: true,
							plugins: {
								legend: { display: false },
								datalabels: {
									anchor: 'end',
									align: 'top',
									color: '#000',
									font: {
										weight: 'bold',
										size: 14
									},
									formatter: (value) => value
								}
							},
							scales: {
								y: {
									beginAtZero: false,
									ticks: {
										callback: function(value) {
											return statusData.includes(value) ? value : '';
										}
									}
								}
							}
						}
					});
				</script>
			</div>

            {{-- tabel pertama --}}
            <div class="flex flex-col justify-center items-center gap-4 mb-10 p-12 w-full max-w-7xl">
                <h1 class="text-5xl font-bold">DAFTAR DOKUMEN KERJA SAMA FAKULTAS MIPA UNIVERSITAS UDAYANA</h1>
                <p class="text-xl font-semibold">Bagian ini menyediakan daftar dokumen kerja sama Fakultas MIPA Universitas Udayana</p>
            </div>

            <div class="p-5 overflow-x-auto w-full mb-10">
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
                        @forelse ($dokumen as $item)
                        <tr class="text-center">
                            <td class="border border-gray-500 px-3 py-2">{{ $item->id }}</td>
                            <td class="border border-gray-500 px-3 py-2">{{ $item->jenis_dokumen }}</td>
                            <td class="border border-gray-500 px-3 py-2 text-left">{{ $item->nama_kerjasama }}</td>
                            <td class="border border-gray-500 px-3 py-2">{{ \Carbon\Carbon::parse($item->waktu_masuk)->translatedFormat('d F Y') }}</td>
                            <td class="border border-gray-500 px-3 py-2">{{ \Carbon\Carbon::parse($item->tgl_selesai)->translatedFormat('d F Y') }}</td>
                            <td class="border border-gray-500 px-3 py-2"><span class="font-semibold">{{ $item->status_dokumen }}</span></td>
                            <td class="border border-gray-500 px-3 py-2"><button class="bg-sky-400 text-white px-3 py-1 rounded-md">☰</button></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Data belum tersedia</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- tabel 2 --}}
            <div class="flex flex-col justify-center items-center gap-4 mb-10 p-12 w-full max-w-7xl">
                <h1 class="text-5xl font-bold">DAFTAR MITRA KERJA SAMA FAKULTAS MIPA UNIVERSITAS UDAYANA</h1>
                <p class="text-xl font-semibold">Bagian ini menyediakan daftar mitra kerja sama Fakultas MIPA
                    Universitas Udayana</p>
            </div>

            <div class="p-5 overflow-x-auto w-full mb-10">
                <table class="w-full border-collapse border border-gray-500 text-sm">
                    <!-- Header -->
                    <thead class="bg-gray-200 text-center font-semibold">
                        <tr>
                            <th class="border border-gray-500 px-3 py-2">No</th>
                            <th class="border border-gray-500 px-3 py-2">Mitra</th>
                            <th class="border border-gray-500 px-3 py-2">Alamat</th>
                            <th class="border border-gray-500 px-3 py-2">Kategori</th>
                            <th class="border border-gray-500 px-3 py-2">Detail</th>
                        </tr>
                    </thead>

                    <!-- Body -->
                    <tbody>
                        <tr class="text-center">
                            <td class="border border-gray-500 px-3 py-2">1</td>
                            <td class="border border-gray-500 px-3 py-2">University Kemarin Sore</td>
                            <td class="border border-gray-500 px-3 py-2 text-left">Jl. Kenangan Indah No. 12, Kel.
                                Sukadamai, Kec. Mentari, Kota Senandika, Provinsi Nusaraya</td>
                            <td class="border border-gray-500 px-3 py-2">Universitas</td>
                            <td class="border border-gray-500 px-3 py-2"><button
                                    class="bg-sky-400 text-white px-3 py-1 rounded-md">☰</button></td>
                        </tr>

                        <tr class="text-center">
                            <td class="border border-gray-500 px-3 py-2"></td>
                            <td class="border border-gray-500 px-3 py-2"></td>
                            <td class="border border-gray-500 px-3 py-2 text-left"></td>
                            <td class="border border-gray-500 px-3 py-2"></td>
                            <td class="border border-gray-500 px-3 py-2"><button
                                    class="bg-sky-400 text-white px-3 py-1 rounded-md"></button></td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="max-w-7xl mx-auto px-6 py-12">
                <div class="flex flex-col justify-center items-center gap-4 mb-10 p-12 w-full max-w-7xl">
                    <h1 class="text-5xl font-bold">DOKUMENTASI DAN INFORMASI</h1>
                    <p class="text-xl font-semibold">Dokumentasi kegiatan terkait perjanjian kerja sama</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <article
                        class="bg-gradient-to-b from-[rgba(230,229,229)] to-[rgba(170,170,170)] rounded-xl p-4 flex flex-col shadow-md">
                        <img src="../img/Artikel 1.png" class="rounded-lg mb-2 h-40 object-cover">
                        <p class="text-[15px] text-black mb-3">10 Desember 2025</p>
                        <h3 class="font-semibold text-xl mb-3 leading-snug text-left">Rapat Pembahasan Kerja Sama
                            Antara Universitas Udayana dan Universitas Kemarin Sore tentang Webinar Series yang akan
                            Diselenggarakan</h3>

                        <!-- push button ke bawah -->
                        <a href="#" class="mt-auto text-left">
                            <button class="bg-sky-500 text-white text-xl px-3 py-1 rounded">Selengkapnya</button>
                        </a>
                    </article>

                    <article
                        class="bg-gradient-to-b from-[rgba(230,229,229)] to-[rgba(170,170,170)] rounded-xl p-4 flex flex-col shadow-md">
                        <img src="../img/Artikel 1.png" class="rounded-lg mb-2 h-40 object-cover">
                        <p class="text-[15px] text-black mb-3">10 Desember 2025</p>
                        <h3 class="font-semibold text-xl mb-3 leading-snug text-left">Rapat Pembahasan Kerja Sama
                            Antara Universitas Udayana dan Universitas Kemarin Sore tentang Webinar Series yang akan
                            Diselenggarakan</h3>

                        <!-- push button ke bawah -->
                        <a href="#" class="mt-auto text-left">
                            <button class="bg-sky-500 text-white text-xl px-3 py-1 rounded">Selengkapnya</button>
                        </a>
                    </article>

                    <article
                        class="bg-gradient-to-b from-[rgba(230,229,229)] to-[rgba(170,170,170)] rounded-xl p-4 flex flex-col shadow-md">
                        <img src="../img/Artikel 1.png" class="rounded-lg mb-2 h-40 object-cover">
                        <p class="text-[15px] text-black mb-3">10 Desember 2025</p>
                        <h3 class="font-semibold text-xl mb-3 leading-snug text-left">Rapat Pembahasan Kerja Sama
                            Antara Universitas Udayana dan Universitas Kemarin Sore tentang Webinar Series yang akan
                            Diselenggarakan</h3>

                        <!-- push button ke bawah -->
                        <a href="#" class="mt-auto text-left">
                            <button class="bg-sky-500 text-white text-xl px-3 py-1 rounded">Selengkapnya</button>
                        </a>
                    </article>

                    <article
                        class="bg-gradient-to-b from-[rgba(230,229,229)] to-[rgba(170,170,170)] rounded-xl p-4 flex flex-col shadow-md">
                        <img src="../img/Artikel 1.png" class="rounded-lg mb-2 h-40 object-cover">
                        <p class="text-[15px] text-black mb-3">10 Desember 2025</p>
                        <h3 class="font-semibold text-xl mb-3 leading-snug text-left">Rapat Pembahasan Kerja Sama
                            Antara Universitas Udayana dan Universitas Kemarin Sore tentang Webinar Series yang akan
                            Diselenggarakan</h3>

                        <!-- push button ke bawah -->
                        <a href="#" class="mt-auto text-left">
                            <button class="bg-sky-500 text-white text-xl px-3 py-1 rounded">Selengkapnya</button>
                        </a>
                    </article>

                    <article
                        class="bg-gradient-to-b from-[rgba(230,229,229)] to-[rgba(170,170,170)] rounded-xl p-4 flex flex-col shadow-md">
                        <img src="../img/Artikel 1.png" class="rounded-lg mb-2 h-40 object-cover">
                        <p class="text-[15px] text-black mb-3">10 Desember 2025</p>
                        <h3 class="font-semibold text-xl mb-3 leading-snug text-left">Rapat Pembahasan Kerja Sama
                            Antara Universitas Udayana dan Universitas Kemarin Sore tentang Webinar Series yang akan
                            Diselenggarakan</h3>

                        <!-- push button ke bawah -->
                        <a href="#" class="mt-auto text-left">
                            <button class="bg-sky-500 text-white text-xl px-3 py-1 rounded">Selengkapnya</button>
                        </a>
                    </article>

                    <article
                        class="bg-gradient-to-b from-[rgba(230,229,229)] to-[rgba(170,170,170)] rounded-xl p-4 flex flex-col shadow-md">
                        <img src="../img/Artikel 1.png" class="rounded-lg mb-2 h-40 object-cover">
                        <p class="text-[15px] text-black mb-3">10 Desember 2025</p>
                        <h3 class="font-semibold text-xl mb-3 leading-snug text-left">Rapat Pembahasan Kerja Sama
                            Antara Universitas Udayana dan Universitas Kemarin Sore tentang Webinar Series yang akan
                            Diselenggarakan</h3>

                        <!-- push button ke bawah -->
                        <a href="#" class="mt-auto text-left">
                            <button class="bg-sky-500 text-white text-xl px-3 py-1 rounded">Selengkapnya</button>
                        </a>
                    </article>

                </div>

                <div class="text-right mt-6 text-sm text-blue-600">
                    <a href="#">&gt;&gt; Selengkapnya</a>
                </div>
            </div>
    </section>

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

</html>
