<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataan Kerja Sama</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header>
        <div class="logo-container">
            <img src="../img/logo.png" alt="Logo" class="nav-logo">
            <div class="logo-text">
                <h3>PENDATAAN</h3>
                <h3>KERJA SAMA</h3>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="#" class="active">Beranda</a></li>
                <li><a href="#">Kerjasama</a></li>
                <li><a href="#">Mitra</a></li>
                <li><a href="#">Informasi</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-overlay">
            
            <div class="center-content">
                <img src="../img/Logo1.png" alt="Logo Tengah" class="main-logo">
                <h1>PENDATAAN KERJA SAMA</h1>
            </div>

            <div class="stats-card">
                <div class="stat-item">
                    <h2>{{ $internal }}</h2>
                    <p>Kerja Sama Internal</p>
                </div>
                <div class="divider"></div>
                <div class="stat-item">
                    <h2>{{ $eksternal }}</h2>
                    <p>Kerja Sama Eksternal</p>
                </div>
            </div>

            <div class="bottom-stats">
                <div class="b-stat-item">
                    <div class="icon-circle blue">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>{{ $eksternal }}</h3>
                    <p class="label">Kerja Sama Eksternal</p>
                    <a href="#">Lihat Selengkapnya</a>
                </div>

                <div class="b-stat-item">
                    <div class="icon-circle green">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h3>{{ $internal }}</h3>
                    <p class="label">Kerja Sama Internal</p>
                    <a href="#">Lihat Selengkapnya</a>
                </div>

                <div class="b-stat-item">
                    <div class="icon-circle red">
                        <i class="fas fa-handshake-slash"></i>
                    </div>
                    <h3>{{ $akanBerakhir }}</h3>
                    <p class="label">Kerja Sama Akan Berakhir</p>
                    <a href="#">Lihat Selengkapnya</a>
                </div>
            </div>

        </div>
    </section>

</body>
</html>