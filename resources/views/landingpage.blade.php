<!DOCTYPE html>
<html>
<head>
    <title>Custom Auth in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#">Wikasa Muebel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</body>
</html>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi CRM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #hero {
            height: 600px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
        }

        #hero h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        #hero p {
            font-size: 24px;
            margin-bottom: 40px;
        }

        #cta {
            background-color: #f5f5f5;
            padding: 50px;
            text-align: center;
        }

        #cta h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        #cta p {
            font-size: 24px;
            margin-bottom: 40px;
        }

        #cta a {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        #cta a:hover {
            background-color: #0062cc;
            text-decoration: none;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Sistem Informasi CRM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/login">Login</a>
      </li>
    </ul>
  </div>
</nav>

    <div id="hero">
        <div class="container">
            <h1 class="display-1 fw-bold">Sistem Informasi CRM</h1>
            <p class="lead">Manajemen pelanggan yang mudah dan efisien dengan sistem informasi CRM.</p>
        </div>
    </div>

    <div id="cta">
        <div class="container">
            <h2 class="fw-bold">Daftar sekarang dan nikmati fitur-fitur kami</h2>
            <p class="lead">Sistem informasi CRM kami dilengkapi dengan fitur-fitur yang lengkap dan mudah digunakan.</p>
            <a href="#" class="btn btn-primary btn-lg">Coba Sekarang</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> -->