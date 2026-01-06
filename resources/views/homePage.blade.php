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
                <a href="{{ route('pengajuan.form') }}">
                    <p class="text-sm sm:text-2xl lg:text-3xl">Ajukan</p>
                </a>
            </button>
        </div>
    </section>

    <section class="bg-white pt-32">
        {{-- MoU MoA IA --}}
        <div class="relative z-10 flex flex-col items-center justify-center min-h-[calc(100vh-80px)] px-5 text-center">
            <div class="bg-white rounded-xl shadow-xl flex w-full max-w-6xl p-12 mb-16 border-2 border-black">
                <div class="flex-1 text-center">
                    <h2 class="text-5xl font-bold pb-2">{{ $mou }}</h2> {{-- nanti di sini koneksikan dengan data yang bener --}}
                    <p class="text-2xl font-bold">MoU</p>
                    <p class="text-sm font-bold">Memorandum of Understanding</p>
                </div>

                <div class="w-px bg-gray-300 mx-4"></div>

                <div class="flex-1 text-center">
                    <h2 class="text-5xl font-bold pb-2">{{ $moa }}</h2> {{-- nanti di sini koneksikan dengan data yang bener --}}
                    <p class="text-2xl font-bold">MoA</p>
                    <p class="text-sm font-bold">Memorandum of Agreement</p>
                </div>

                <div class="w-px bg-gray-300 mx-4"></div>

                <div class="flex-1 text-center">
                    <h2 class="text-5xl font-bold pb-2">{{ $ia }}</h2> {{-- nanti di sini koneksikan dengan data yang bener --}}
                    <p class="text-2xl font-bold">IA</p>
                    <p class="text-sm font-bold">Implementation Arrangement</p>
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
            <div class="flex flex-col justify-center items-center gap-4 p-12 w-full max-w-7xl">
                <h1 class="text-5xl font-bold">DAFTAR DOKUMEN KERJA SAMA FAKULTAS MIPA UNIVERSITAS UDAYANA</h1>
                <p class="text-xl font-semibold">Bagian ini menyediakan daftar dokumen kerja sama Fakultas MIPA Universitas Udayana</p>
            </div>

            <div id="tabelDokumen" class="p-5 overflow-x-auto w-full mb-10">
				<div class="p-5 overflow-x-auto w-full mb-10">

					{{-- SEARCH & SHOW ENTRIES (TAMBAH DI SINI) --}}
					<form method="GET" class="flex flex-wrap justify-between items-center mb-4 gap-4">
						<div class="flex items-center gap-2">
							<label class="text-sm font-semibold">Show</label>
							<select name="perPage" onchange="this.form.submit()"
								class="border border-gray-400 rounded px-2 py-1 text-sm">
								@foreach ([10,20,50,100] as $size)
									<option value="{{ $size }}" {{ request('perPage',10)==$size?'selected':'' }}>
										{{ $size }}
									</option>
								@endforeach
							</select>
							<span class="text-sm font-semibold">entries</span>
						</div>

						<div>
							<input type="text" name="search" value="{{ request('search') }}"
								placeholder="Search..."
								class="border border-gray-400 rounded px-3 py-1 text-sm w-60">
						</div>
					</form>
                <table class="w-full border-collapse border border-gray-500 text-sm">
                    <!-- Header -->
                    <thead class="bg-gray-200 text-center font-semibold">
                        <tr>
                            <th class="border border-gray-500 px-3 py-2">No</th>
                            <th class="border border-gray-500 px-3 py-2">Jenis<br>Dokumen</th>
                            <th class="border border-gray-500 px-3 py-2">Judul Kerja Sama</th>
                            <th class="border border-gray-500 px-3 py-2">Jenis Kerja Sama</th>
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
                            <td class="border border-gray-500 px-3 py-2">{{ $dokumen->firstItem() + $loop->index }}</td>
                            <td class="border border-gray-500 px-3 py-2">{{ $item->jenis_dokumen }}</td>
                            <td class="border border-gray-500 px-3 py-2 text-left">{{ $item->nama_kerjasama }}</td>
                            <td class="border border-gray-500 px-3 py-2">{{ $item->jenis_kerjasama }}</td>
                            <td class="border border-gray-500 px-3 py-2">{{ \Carbon\Carbon::parse($item->waktu_masuk)->translatedFormat('d F Y') }}</td>
                            <td class="border border-gray-500 px-3 py-2">{{ \Carbon\Carbon::parse($item->tgl_selesai)->translatedFormat('d F Y') }}</td>
                            <td class="border border-gray-500 px-3 py-2"><span class="font-semibold">{{ $item->status }}</span></td>
                            <td class="border border-gray-500 px-3 py-2">
                                <button onclick='openDetailModal(@json($item))' class="bg-sky-400 text-white px-3 py-1 rounded-md hover:bg-sky-500">
    ☰
</button>
                              
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Data belum tersedia</td>
                        </tr>
                        @endforelse
                        <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Cek apakah ada query string search atau perPage
                            const urlParams = new URLSearchParams(window.location.search);
                            const search = urlParams.get('search');
                            const perPage = urlParams.get('perPage');

                            if (search || perPage) {
                                // Scroll ke tabel
                                const tabel = document.getElementById('tabelDokumen');
                                if(tabel) {
                                    tabel.scrollIntoView({ behavior: 'smooth', block: 'start' });
                                }
                            }
                        });
                        </script>

                    </tbody>
                </table>
				{{-- PAGINATION (TAMBAH DI SINI) --}}
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

    <div class="max-w-7xl mx-auto px-6 py-12">
                <div class="flex flex-col justify-center items-center gap-4 p-12 w-full max-w-7xl">
                    <h1 class="text-5xl font-bold">DOKUMENTASI DAN INFORMASI</h1>
                    <p class="text-xl font-semibold">Dokumentasi kegiatan terkait perjanjian kerja sama</p>
                </div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach ($dokumenAcc as $item)
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

{{-- Pagination artikel --}}
<div class="flex justify-center mt-6">
    {{ $dokumenAcc->links() }}
</div>


				</div> <!-- penutup grid -->

				{{-- TAMBAHKAN MODAL DI SINI --}}
@foreach ($dokumenAcc as $item)
    <div id="modal-{{ $item->id }}"
         class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl w-full max-w-2xl p-6 relative">
            <button onclick="closeModal({{ $item->id }})"
                    class="absolute top-3 right-4 text-xl font-bold">&times;</button>

            <h2 class="text-2xl font-bold mb-4">Detail Kerja Sama</h2>

            <div class="space-y-4 text-sm text-gray-800">
                <p><span class="font-semibold">Judul:</span><br>{{ $item->nama_kerjasama }}</p>
                <p><span class="font-semibold">Deskripsi:</span><br>{{ $item->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
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
<!-- Modal tunggal untuk tabel -->
<div id="detailModal" class="fixed inset-0 bg-black/50 hidden justify-center items-center z-50">
    <div class="bg-white w-full max-w-xl rounded-xl shadow-xl p-6 relative">
        <h2 class="text-xl font-bold text-center mb-4">Rincian Informasi Mitra Kerja Sama</h2>
        <div id="modalContent" class="text-sm space-y-3"></div>
        <div class="text-center mt-6">
            <button onclick="closeDetailModal()" class="px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
                Tutup
            </button>
        </div>
    </div>
</div>

	<script>
		function garis() {
			return `<hr class="border-gray-300 my-2">`;
		}

		// Fungsi khusus untuk tombol di tabel
function openDetailModal(data) {
    const content = `
        <div class="font-semibold text-center">${data.nama_kerjasama}</div>
        <hr class="border-gray-300 my-2">
        <div><b>Nama Mitra:</b> ${data.nama_mitra}</div>
        <hr class="border-gray-300 my-2">
        <div><b>Program Studi:</b> ${data.program_studi}</div>
        <hr class="border-gray-300 my-2">
        <div><b>Judul Kerja Sama:</b> ${data.nama_kerjasama}</div>
        <hr class="border-gray-300 my-2">
        <div><b>Jenis Dokumen:</b> ${data.jenis_dokumen}</div>
        <hr class="border-gray-300 my-2">
        <div><b>Status:</b> ${data.status}</div>
        <hr class="border-gray-300 my-2">
        <div><b>Link Dokumen:</b> <a href="/storage/${data.path}" target="_blank" class="text-blue-600 underline hover:text-blue-800">Lihat Dokumen</a></div>
    `;
    document.getElementById('modalContent').innerHTML = content;
    document.getElementById('detailModal').classList.remove('hidden');
    document.getElementById('detailModal').classList.add('flex');
}

function closeDetailModal() {
    document.getElementById('detailModal').classList.add('hidden');
    document.getElementById('detailModal').classList.remove('flex');
}

	</script>
        <script>
    function openModal(id) {
        document.getElementById('modal-' + id).classList.remove('hidden');
    }
    function closeModal(id) {
        document.getElementById('modal-' + id).classList.add('hidden');
    }
    </script>

</body>

</html>
