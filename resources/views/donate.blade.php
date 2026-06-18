<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate - Kahel na Langit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="viewstyle.css.css">
    <style>
        .navbar { background: #2c3e50 !important; }
        .page-header { background: linear-gradient(135deg, #f39c12, #e67e22); color: white; padding: 50px 0; margin-bottom: 30px; }
        footer { background: #2c3e50; color: white; padding: 20px 0; text-align: center; margin-top: 50px; }
        .qr-image { max-width: 200px; }
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
            <h1>Support Our Mission</h1>
            <p class="lead">Your donation helps us empower communities</p>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                @if($donation)
                    <!-- Bank 1 -->
                    @if($donation->bank1_name)
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <h4>🏦 {{ $donation->bank1_name }}</h4>
                                <p><strong>Account Name:</strong> {{ $donation->bank1_account_name }}</p>
                                <p><strong>Account Number:</strong> {{ $donation->bank1_account_number }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Bank 2 -->
                    @if($donation->bank2_name)
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <h4>🏦 {{ $donation->bank2_name }}</h4>
                                <p><strong>Account Name:</strong> {{ $donation->bank2_account_name }}</p>
                                <p><strong>Account Number:</strong> {{ $donation->bank2_account_number }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- GCash -->
                    @if($donation->gcash_name || $donation->gcash_number)
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <h4>📱 GCash</h4>
                                @if($donation->gcash_name)
                                    <p><strong>Account Name:</strong> {{ $donation->gcash_name }}</p>
                                @endif
                                @if($donation->gcash_number)
                                    <p><strong>GCash Number:</strong> {{ $donation->gcash_number }}</p>
                                @endif
                                @if($donation->gcash_qr)
                                    <div class="text-center mt-2">
                                        <img src="{{ asset('storage/' . $donation->gcash_qr) }}" alt="GCash QR Code" class="qr-image img-fluid">
                                        <p class="text-muted small">Scan to donate via GCash</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                @else
                    <div class="alert alert-info">Donation details coming soon!</div>
                @endif
            </div>

            <!-- Guidelines -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4>📋 Donation Guidelines</h4>
                        <hr>
                        <p>{{ $donation->guidelines ?? 'Please check back for donation guidelines.' }}</p>
                        <div class="alert alert-success mt-3">
                            <h5>💚 Thank You!</h5>
                            <p>Your generosity helps us continue our mission of empowering communities.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>© 2026 Kahel na Langit. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
