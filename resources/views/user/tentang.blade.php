<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Web Berita</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #1a1a1a;
            color: #ccc;
        }
        .navbar-custom {
            background-color: #151515;
            border-bottom: 1px solid #2a2a2a;
        }
        .navbar-brand, .nav-link {
            color: #d4af37 !important;
            font-weight: 700;
        }
        .nav-link:hover {
            color: #bfa133 !important;
        }
        .hero-section {
            background: linear-gradient(135deg, #151515 0%, #2a2a2a 100%);
            padding: 80px 0;
            border-bottom: 1px solid #2a2a2a;
            text-align: center;
        }
        .hero-title {
            color: #d4af37;
            font-weight: 800;
            font-size: 3rem;
            margin-bottom: 20px;
        }
        .about-card {
            background-color: #222;
            border: 1px solid #333;
            border-radius: 10px;
            padding: 40px;
            margin-top: -40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }
        .footer {
            background-color: #151515;
            border-top: 1px solid #2a2a2a;
            padding: 20px 0;
            text-align: center;
            color: rgba(212, 175, 55, 0.7);
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        html, body {
            height: 100%;
            margin: 0;
        }
        #page-container {
            position: relative;
            min-height: 100%;
        }
        #content-wrap {
            padding-bottom: 60px; /* Footer height */
        }
    </style>
</head>
<body>

    <div id="page-container">
        <div id="content-wrap">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-custom">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/beranda') }}"><i class="fas fa-crown mr-2"></i>Web Berita</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fas fa-bars" style="color: #d4af37;"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/beranda') }}">Beranda</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/tentang') }}">Tentang Kami</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt mr-1"></i> Dashboard</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Hero -->
            <header class="hero-section">
                <div class="container">
                    <h1 class="hero-title">Tentang Kami</h1>
                    <p class="lead text-muted">Portal berita independen yang menyuarakan kebenaran secara objektif.</p>
                </div>
            </header>

            <!-- Main Content -->
            <main class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="about-card text-center">
                            <i class="fas fa-info-circle fa-4x mb-4" style="color: #d4af37;"></i>
                            <h3 class="mb-3" style="color: #d4af37; font-weight: 700;">Visi & Misi Kami</h3>
                            <p class="text-justify text-white-50">
                                Kami berkomitmen untuk menjadi media online terdepan yang menyampaikan informasi terkini, berimbang, dan tepercaya untuk mencerdaskan kehidupan bangsa. Kami percaya bahwa jurnalisme yang kredibel adalah pilar penting dalam demokrasi dan kemajuan sosial.
                            </p>
                            <p class="text-justify text-white-50 mt-3">
                                Didukung oleh tim redaksi yang berdedikasi tinggi, kami menyajikan berita politik, hukum, ekonomi, olahraga, teknologi, dan hiburan secara komprehensif 24/7. Terima kasih telah menjadikan kami sebagai referensi informasi Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <span>Copyright &copy; Web Berita {{ date('Y') }}</span>
            </div>
        </footer>
    </div>

    <!-- Bootstrap & jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
