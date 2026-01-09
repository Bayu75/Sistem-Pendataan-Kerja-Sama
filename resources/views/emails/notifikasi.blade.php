<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Notifikasi Kerja Sama</title>
</head>
<body>
    <h2>
        @if($type === 'kadaluarsa')
            Kerja Sama Telah Kadaluarsa
        @else
            Kerja Sama Telah di Diterima
        @endif
    </h2>

    <p>Halo,</p>

    <p>Berikut detail kerja sama:</p>

    <ul>
        <li><strong>Nama Kerja Sama:</strong> {{ $kerjasama->nama_kerjasama }}</li>
        <li><strong>Jenis Kerja Sama:</strong> {{ $kerjasama->jenis_kerjasama }}</li>
        <li><strong>Tanggal Selesai:</strong> {{ \Carbon\Carbon::parse($kerjasama->tgl_selesai)->format('d-m-Y') }}</li>
    </ul>

    @if($type === 'kadaluarsa')
        <p>Mohon maaf kerja sama ini sudah kadaluarsa. Terima Kasih.</p>
    @else
        <p>Selamat pengajuan anda di acc, silahkan chat no ini: Gede(08504343)</p>
    @endif

    <p>Terima kasih.</p>
</body>
</html>