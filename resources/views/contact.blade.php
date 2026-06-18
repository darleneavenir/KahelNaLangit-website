<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Kahel na Langit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="viewstyle.css.css">
    <style>
        .navbar { background: #2c3e50 !important; }
        .page-header { background: linear-gradient(135deg, #f39c12, #e67e22); color: white; padding: 50px 0; }
        footer { background: #2c3e50; color: white; padding: 20px 0; text-align: center; margin-top: 50px; }
        .card { transition: transform 0.3s; }
        .card:hover { transform: translateY(-5px); }
    </style>
</head>
<body>
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

    <div class="page-header">
        <div class="container">
            <h1>Contact Us</h1>
            <p class="lead">We'd love to hear from you</p>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4>📧 Send Us a Message</h4>
                        <hr>
                        @auth
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <form method="POST" action="{{ route('contact.submit') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Subject</label>
                                    <input type="text" class="form-control" name="subject" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Contact Number (optional)</label>
                                    <input type="text" class="form-control" name="contact_number">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea class="form-control" name="message" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-warning text-white w-100">Send Message</button>
                            </form>
                        @else
                            <div class="alert alert-info">
                                <strong>🔐 Please login or register to send a message.</strong>
                            </div>
                            <a href="/login" class="btn btn-primary">Login</a>
                            <a href="/register" class="btn btn-secondary">Register</a>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4>📍 Contact Information</h4>
                        <hr>
                        <p><strong>📧 Email:</strong> info@kahelnalangit.org</p>
                        <p><strong>📞 Phone:</strong> +63 912 345 6789</p>
                        <p><strong>📍 Address:</strong> Floodway, Taytay, Rizal, Philippines</p>
                        <hr>
                        <h5>Follow Us</h5>
                        <p>
                            <a href="#" class="btn btn-primary btn-sm">Facebook</a>
                            <a href="#" class="btn btn-info btn-sm text-white">Instagram</a>
                            <a href="#" class="btn btn-dark btn-sm">Twitter</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>© 2026 Kahel na Langit. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
