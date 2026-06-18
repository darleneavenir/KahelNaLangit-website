<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Kahel na Langit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="viewstyle.css.css">
    <style>
        .navbar { background: #2c3e50 !important; }
        footer { background: #2c3e50; color: white; padding: 20px 0; text-align: center; margin-top: 50px; }
        .profile-header { background: linear-gradient(135deg, #f39c12, #e67e22); color: white; padding: 50px 0; margin-bottom: 30px; }
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
                    <li class="nav-item"><a class="nav-link" href="/profile">Profile</a></li>
                    <li class="nav-item">
                        <form method="POST" action="/logout" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Profile Header -->
    <div class="profile-header">
        <div class="container">
            <h1>My Profile</h1>
            <p class="lead">Welcome back, {{ $user->name }}!</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- Profile Card -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h2 class="display-1">👤</h2>
                        <h5>{{ $user->name }}</h5>
                        <p class="text-muted">{{ $user->email }}</p>
                        <span class="badge bg-success">Verified User</span>
                    </div>
                </div>
            </div>

            <!-- Account Information -->
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4>Account Information</h4>
                        <hr>
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Member Since:</strong> {{ $user->created_at->format('F d, Y') }}</p>
                        @if($user->loginLogs)
                            <p><strong>Total Logins:</strong> {{ $user->loginLogs->count() }}</p>
                        @endif
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
