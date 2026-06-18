<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partnerships - Kahel na Langit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="viewstyle.css.css">
    <style>
        .navbar { background: #2c3e50 !important; }
        .page-header { background: linear-gradient(135deg, #f39c12, #e67e22); color: white; padding: 50px 0; margin-bottom: 30px; }
        footer { background: #2c3e50; color: white; padding: 20px 0; text-align: center; margin-top: 50px; }
        .card { transition: transform 0.3s; }
        .card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">🌅 Kahel na Langit</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/partnerships">Partnerships</a></li>
                    <li class="nav-item"><a class="nav-link" href="/donate">Donate</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1>Our Partnerships</h1>
            <p class="lead">Collaborating with organizations to create lasting impact</p>
        </div>
    </div>

    <!-- Partnerships Grid -->
    <div class="container">
        @if($partnerships->count() > 0)
            <div class="row">
                @foreach($partnerships as $partnership)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center">
                                <div style="font-size: 48px; margin-bottom: 15px;">🤝</div>
                                <h5 class="card-title">{{ $partnership->name }}</h5>
                                <p class="card-text text-muted">{{ $partnership->description ?? 'No description available.' }}</p>
                                @if($partnership->website)
                                    <a href="{{ $partnership->website }}" target="_blank" class="btn btn-sm btn-outline-primary">Visit Website</a>
                                @endif
                                <br><br>
                                <span class="badge bg-{{ $partnership->status === 'current' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($partnership->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center">
                <h4>No partnerships yet</h4>
                <p>Check back soon for updates on our partners!</p>
            </div>
        @endif
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>© 2026 Kahel na Langit. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
