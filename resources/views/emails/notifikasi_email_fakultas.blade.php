<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Notifikasi Kerja Sama</title>
</head>
<body>
    <h2>
        @if($type === 'kadaluarsa')
            Notifikasi Kerja Sama yang Telah Kadaluarsa dari Mitra
        @else
            Ajakan Kerja Sama Baru dari Mitra
        @endif
    </h2>

    <p>Yth. Pimpinan Fakultas Matematika dan Ilmu Pengetahuan Alam,</p>

    @if($type === 'kadaluarsa')
        <p>Dengan hormat, bersama email ini kami dari pihak administrasi menyampaikan informasi sebagai berikut:</p>

        <ol>
            <li>
                Telah terdapat pengajuan kerja sama dari mitra
                <strong>{{ $mitra->nama_mitra }}</strong>
                dengan judul kerja sama
                <strong>{{ $kerjasama->nama_kerjasama }}</strong>.
            </li>
            <li>
                Kerja sama tersebut memiliki batas waktu pelaksanaan hingga tanggal
                <strong>{{ \Carbon\Carbon::parse($kerjasama->tgl_selesai)->format('d-m-Y') }}</strong>.
            </li>
            <li>
                Berdasarkan data sistem, kerja sama tersebut dinyatakan
                <strong>telah kadaluarsa</strong> dan tidak dapat dilanjutkan.
            </li>
            <li>
                Terima Kasih.
            </li>
        </ol>
    @else
        <p>Dengan hormat, bersama email ini kami dari pihak administrasi menyampaikan informasi sebagai berikut:</p>

        <ol>
            <li>
                Terdapat ajakan kerja sama baru dari mitra
                <strong>{{ $mitra->nama_mitra }}</strong>
                kepada FMIPA.
            </li>
            <li>
                Kerja sama tersebut berjudul
                <strong>{{ $kerjasama->nama_kerjasama }}</strong>
                dengan jenis kerja sama
                <strong>{{ $kerjasama->jenis_kerjasama }}</strong>
                dan dengan jenis dokumen
                <strong>{{ $mitra->jenis_dokumen }}</strong>
                serta atas nama PIC
                <strong>{{ $mitra->pic }}</strong>.
            </li>
            <li>
                Masa berlaku kerja sama ini tercatat hingga tanggal
                <strong>{{ \Carbon\Carbon::parse($kerjasama->tgl_selesai)->format('d-m-Y') }}</strong>.
            </li>
            <li>
                Kami berharap pihak fakultas dapat meninjau ajakan kerja sama ini dan memberikan tindak lanjut sesuai dengan prosedur dan kebijakan internal fakultas.
            </li>
        </ol>
    @endif

    <p>Demikian informasi ini kami sampaikan. Atas perhatian dan kerja sama yang baik, kami ucapkan terima kasih.</p>

    <p>Hormat kami,<br>
    <strong>Admin</strong></p>
</body>
</html>
