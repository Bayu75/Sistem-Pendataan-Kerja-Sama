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

    <x-sidebar></x-sidebar>

    <div class="flex-1 p-8 text-white">
        <h1 class="text-4xl font-bold mb-16">DASHBOARD</h1>

        <div class="flex justify-between px-12 mb-6">

            <!-- JUMLAH MITRA -->
            <div class="w-[250px] h-[250px] bg-white border-4 border-[#3a536d] rounded-lg flex flex-col items-center justify-between cursor-pointer text-center">

                <p class="px-2 text-xl font-extrabold italic bg-gradient-to-b from-sky-400 via-sky-500 to-sky-700 bg-clip-text text-transparent">
                    JUMLAH
                </p>

                <div class="w-[140px] h-[140px]">
                    <canvas id="miniJenisChart"></canvas>
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

                <!-- MINI BAR CHART -->
                <div class="w-[180px] h-[120px]">
                    <canvas id="miniStatusBar"></canvas>
                </div>

                <p class="text-sm font-semibold text-gray-700">
                    Aktif • Kadaluarsa • Mendekati Kadaluarsa
                </p>
            </div>

        </div>

        <!-- GRAFIK BESAR -->
        <div class="mx-12 h-[250px] flex flex-col items-center justify-center text-center bg-white/30 border-2 border-white rounded-2xl text-base font-medium text-black">

            <div class="mx-12 mt-8 grid grid-cols-1 lg:grid-cols-2 gap-10 w-full h-full">

                <div class="flex flex-col justify-center items-center">
                    <h2 class="font-bold text-lg mb-4 text-black">Jumlah Dokumen per Jenis</h2>
                    <canvas id="donutChart" class="w-full" style="max-height:180px;"></canvas>
                </div>

                <div class="flex flex-col justify-center items-center">
                    <h2 class="font-bold text-lg mb-4 text-black">Jumlah Dokumen per Status</h2>
                    <canvas id="barChart" class="w-full" style="max-height:180px;"></canvas>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

<script>
Chart.register(ChartDataLabels);

/* DATA */
const jenisLabels  = {!! json_encode($grafikJenisDokumen->keys()) !!};
const jenisData    = {!! json_encode($grafikJenisDokumen->values()) !!};

const statusLabels = {!! json_encode($grafikStatusDokumen->keys()) !!};
const statusData   = {!! json_encode($grafikStatusDokumen->values()) !!};

/* TOTAL */
const totalJenis = jenisData.reduce((a,b)=>a+b,0);

/* CENTER TEXT */
const centerTextPlugin = {
    id: 'centerText',
    beforeDraw(chart) {
        const { ctx, width, height } = chart;
        ctx.restore();
        ctx.font = 'bold 18px Poppins';
        ctx.fillStyle = '#000';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText(totalJenis, width/2, height/2);
        ctx.save();
    }
};

/* MINI DONUT JENIS */
new Chart(document.getElementById('miniJenisChart'), {
    type: 'doughnut',
    plugins: [centerTextPlugin],
    data: {
        labels: jenisLabels,
        datasets: [{
            data: jenisData,
            backgroundColor: ['#22c55e','#3b82f6','#f97316','#a855f7'],
        }]
    },
    options: {
        cutout: '70%',
        plugins: { legend:{display:false}, datalabels:{display:false} }
    }
});

/* MINI BAR STATUS */
new Chart(document.getElementById('miniStatusBar'), {
    type: 'bar',
    data: {
        labels: statusLabels,
        datasets: [{
            data: statusData,
            backgroundColor: ['#22c55e','#facc15','#ef4444'],
            borderRadius: 6
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
                font: { weight: 'bold', size: 12 }
            }
        },
        scales: {
            x: { ticks:{ font:{size:10} }, display:false },
            y: { beginAtZero:true, display:false }
        }
    }
});

/* DONUT BESAR */
new Chart(document.getElementById('donutChart'), {
    type: 'doughnut',
    data: {
        labels: jenisLabels,
        datasets: [{
            data: jenisData,
            backgroundColor: ['#22c55e','#3b82f6','#f97316','#a855f7'],
        }]
    },
    options: {
        cutout: '65%',
        plugins: {
            legend: { position:'bottom' },
            datalabels:{ color:'#fff', font:{weight:'bold'} }
        }
    }
});

/* BAR BESAR */
new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: statusLabels,
        datasets: [{
            data: statusData,
            backgroundColor: ['#22c55e','#facc15','#ef4444']
        }]
    },
    options: {
        plugins: {
            legend:{display:false},
            datalabels:{ anchor:'end', align:'top', font:{weight:'bold'} }
        },
        scales:{ y:{ beginAtZero:true } }
    }
});
</script>

</body>
</html>
