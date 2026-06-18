<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Partnership - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar { min-height: 100vh; background: #34495e; padding: 0; }
        .sidebar a { color: white; text-decoration: none; display: block; padding: 12px 20px; }
        .sidebar a:hover { background: #2c3e50; }
        .navbar { background: #2c3e50 !important; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar p-0">
                <div class="p-3"><h4 class="text-white">🌅 Kahel na Langit</h4><hr class="border-light"></div>
                <a href="{{ route('admin.dashboard') }}">📊 Dashboard</a>
                <a href="{{ route('admin.updates.index') }}">📝 Updates</a>
                <a href="{{ route('admin.partnerships.index') }}" class="active">🤝 Partnerships</a>
                <a href="{{ route('admin.wishlist.index') }}">📋 Wishlist</a>
                <a href="{{ route('admin.inquiries.index') }}">✉️ Inquiries</a>
                <a href="{{ route('admin.donations.edit') }}">💰 Donations</a>
                <hr class="border-light">
                <form method="POST" action="{{ route('admin.logout') }}" class="p-3">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Logout</button>
                </form>
            </div>

            <div class="col-md-9 p-4">
                <div class="card">
                    <div class="card-body">
                        <h2>Add New Partnership</h2>
                        <form method="POST" action="{{ route('admin.partnerships.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Organization Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="website" class="form-label">Website URL</label>
                                <input type="text" class="form-control" id="website" name="website">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="current">Current</option>
                                    <option value="past">Past</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="year_started" class="form-label">Year Started</label>
                                <input type="number" class="form-control" id="year_started" name="year_started" min="1900" max="{{ date('Y') }}">
                            </div>
                            <div class="mb-3">
                                <label for="logo" class="form-label">Partner Logo</label>
                                <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Save Partnership</button>
                            <a href="{{ route('admin.partnerships.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
