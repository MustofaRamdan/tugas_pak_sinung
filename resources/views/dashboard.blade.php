<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>To-do List</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .carousel-item img {
            height: 600px;
            object-fit: cover;
            width: 100%;
        }
        .carousel-control-prev-icon, .carousel-control-next-icon {
            background-color: black;
        }
        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">To-do List</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Carousel Section -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('image/image1.webp')}}" class="d-block w-100" alt="Track Tasks">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Stay Organized with To-do List</h5>
                    <p>Manage your tasks effectively with reminders and more.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('image/image.jpg')}}" class="d-block w-100" alt="Set Reminders">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Set Reminders</h5>
                    <p>Never miss a deadline again with timely reminders.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('image/image2.jpg')}}" class="d-block w-100" alt="Collaborate with Teams">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Collaborate with Teams</h5>
                    <p>Work together with your team members and achieve your goals.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
