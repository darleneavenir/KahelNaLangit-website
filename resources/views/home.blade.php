<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Kahel na Langit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .navbar { background: #6e3708 !important; }
        .hero { background: linear-gradient(135deg, #f39c12, #e67e22); color: white; padding: 100px 0; text-align: center; }
        footer { background: #2c3e50; color: white; padding: 20px 0; text-align: center; margin-top: 50px; }
        .btn-warning { background: #e67e22; border: none; }
        .btn-warning:hover { background: #d35400; }
        .card { transition: transform 0.3s; }
        .card:hover { transform: translateY(-5px); }
        .section-title { color: #e67e22; margin-bottom: 30px; }
        .progress { height: 10px; }
        .update-card { border-left: 4px solid #e67e22; }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">🌅 Kahel na Sharmaine</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/partnerships">Partnerships</a></li>
                    <li class="nav-item"><a class="nav-link" href="/donate">Donate</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="/profile">Profile</a></li>
                        <li class="nav-item">
                            <form method="POST" action="/logout" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div class="container">
            <h1 style="font-size: 48px;">Kahel na Langit</h1>
            <p class="lead" style="font-size: 24px;">Empowering Communities, Building Hope</p>
            <p>A community-driven initiative dedicated to uplifting vulnerable communities.</p>
            <a href="/donate" class="btn btn-warning btn-lg text-white">Donate Now</a>
            <a href="/about" class="btn btn-outline-light btn-lg ms-2">Learn More</a>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <h2 style="font-size: 48px;">🏠</h2>
                        <h5>Community Development</h5>
                        <p class="text-muted">Supporting housing and infrastructure initiatives for vulnerable communities.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <h2 style="font-size: 48px;">🤝</h2>
                        <h5>Fundraising</h5>
                        <p class="text-muted">Community-based fundraising campaigns to support sustainable programs.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <h2 style="font-size: 48px;">🌱</h2>
                        <h5>Community Engagement</h5>
                        <p class="text-muted">Awareness campaigns promoting resilience and social responsibility.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Updates Section -->
    @if($updates->count() > 0)
        <div class="container mt-5">
            <h2 class="section-title text-center">📢 Latest Updates</h2>
            <div class="row">
                @foreach($updates as $update)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm update-card">
                            <div class="card-body">
                                <span class="badge bg-{{ $update->category === 'announcement' ? 'warning' : 'info' }} mb-2">
                                    {{ ucfirst(str_replace('_', ' ', $update->category)) }}
                                </span>
                                <h5>{{ $update->title }}</h5>
                                <p class="text-muted">{{ Str::limit($update->content, 100) }}</p>
                                <small class="text-muted">{{ $update->created_at->format('M d, Y') }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Wishlist Section -->
    @if($wishlist->count() > 0)
        <div class="container mt-5">
            <h2 class="section-title text-center">📋 Community Wishlist</h2>
            <p class="text-center text-muted">Items needed for our community projects</p>
            <div class="row">
                @foreach($wishlist as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5>{{ $item->item_name }}</h5>
                                <p class="text-muted">{{ Str::limit($item->description, 80) }}</p>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" style="width: {{ $item->quantity_needed > 0 ? ($item->quantity_received / $item->quantity_needed) * 100 : 0 }}%">
                                        {{ $item->quantity_received }}/{{ $item->quantity_needed }}
                                    </div>
                                </div>
                                <small class="text-muted">
                                    Status: <span class="badge bg-{{ $item->status === 'complete' ? 'success' : 'warning' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Partnerships Section -->
    @if($partnerships->count() > 0)
        <div class="container mt-5">
            <h2 class="section-title text-center">🤝 Our Partners</h2>
            <div class="row">
                @foreach($partnerships as $partner)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 text-center shadow-sm">
                            <div class="card-body">
                                <div style="font-size: 48px;">🤝</div>
                                <h5>{{ $partner->name }}</h5>
                                <p class="text-muted">{{ Str::limit($partner->description, 80) }}</p>
                                @if($partner->website)
                                    <a href="{{ $partner->website }}" target="_blank" class="btn btn-sm btn-outline-primary">Visit Website</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>🌅 Kahel na Langit</h5>
                <p>Empowering Communities, Building Hope</p>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="/" class="text-white text-decoration-none">Home</a></li>
                    <li><a href="/about" class="text-white text-decoration-none">About</a></li>
                    <li><a href="/partnerships" class="text-white text-decoration-none">Partnerships</a></li>
                    <li><a href="/donate" class="text-white text-decoration-none">Donate</a></li>
                    <li><a href="/contact" class="text-white text-decoration-none">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Admin Access</h5>
                <ul class="list-unstyled">
                    <li><a href="/admin/login" class="text-warning text-decoration-none">🔑 Admin Login</a></li>
                </ul>
            </div>
        </div>
        <hr class="border-light">
        <p class="text-center">© 2026 Kahel na Langit. All rights reserved.</p>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
