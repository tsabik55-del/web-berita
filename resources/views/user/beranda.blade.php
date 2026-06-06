<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Web Berita</title>
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
        .card-custom {
            background-color: #222;
            border: 1px solid #333;
            border-radius: 10px;
            margin-bottom: 30px;
            transition: transform 0.3s;
        }
        .card-custom:hover {
            transform: translateY(-5px);
        }
        .card-title {
            color: #d4af37;
            font-weight: 700;
        }
        .badge-custom {
            background-color: #d4af37;
            color: #1a1a1a;
            font-weight: 700;
        }
        .footer {
            background-color: #151515;
            border-top: 1px solid #2a2a2a;
            padding: 20px 0;
            text-align: center;
            color: rgba(212, 175, 55, 0.7);
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/beranda') }}"><i class="fas fa-crown mr-2"></i>Web Berita</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fas fa-bars" style="color: #d4af37;"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
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
            <h1 class="hero-title">Selamat Datang di Portal Redaksi</h1>
            <p class="lead text-muted">Menyajikan berita teraktual, terpercaya, dan mendalam setiap saat.</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container my-5">
        <h2 class="mb-4" style="color: #d4af37; font-weight: 700; border-left: 5px solid #d4af37; padding-left: 15px;">Berita Terbaru</h2>
        <div class="row">
            @forelse(\App\Models\Article::with(['category', 'user'])->latest()->take(6)->get() as $article)
                <div class="col-md-4">
                    <div class="card card-custom h-100">
                        <div class="card-body d-flex flex-column">
                            <div class="mb-2">
                                <span class="badge badge-custom">{{ $article->category->name }}</span>
                            </div>
                            <h4 class="card-title">{{ $article->title }}</h4>
                            <p class="card-text text-muted flex-grow-1">
                                {{ Str::limit(strip_tags($article->content), 120) }}
                            </p>
                            <div class="mt-3 pt-3 border-top border-secondary d-flex justify-content-between align-items-center">
                                <small class="text-muted"><i class="fas fa-user mr-1"></i> {{ $article->user->name }}</small>
                                <small class="text-muted">{{ $article->created_at->format('d M Y') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="far fa-newspaper fa-4x mb-3 text-muted"></i>
                    <p class="text-muted">Belum ada berita yang diterbitkan saat ini.</p>
                </div>
            @endforelse
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <span>Copyright &copy; Web Berita {{ date('Y') }}</span>
        </div>
    </footer>

    <!-- Bootstrap & jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
