<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c26cd2166c.js"></script>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>{{ $category->name }} - Dapur Digital</title>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg sticky-top bg-white shadow">
        <div class="container">
            <a class="navbar-brand" href="">Dapur Digital</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <img src="{{ asset('images/hamburger.png') }}" alt="Menu" class="hamburger-icon">
            </button>
            
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav m-auto my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Recipe">Recipe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#About">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Category Header -->
    <section class="category-header py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 mb-3">{{ $category->id }}</h1>
                    <p class="lead">Temukan resep {{ $category->name }} terbaik di sini</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Category Filter -->
    <section class="category-filter py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="category-tabs d-flex justify-content-center flex-wrap gap-3">
                        @foreach($allCategories as $cat)
                            <a href="{{ route('categories.show', $cat->id) }}" 
                               class="btn {{ $cat->id == $category->id ? 'btn-primary' : 'btn-outline-primary' }}">
                                {{ $cat->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recipes Grid -->
    <section class="recipes-grid py-5">
        <div class="container">
            @if($recipes->count() > 0)
                <div class="row">
                    @foreach ($recipes as $recipe)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="card border-0 bg-light h-100">
                                <div class="card-body p-0">
                                    <a href="{{ url('/recipes/' . $recipe->id) }}">
                                        <img src="{{ asset('storage/' . $recipe->image) }}" 
                                             class="card-img-top img-resep" 
                                             alt="{{ $recipe->title }}"
                                             style="height: 200px; object-fit: cover;">
                                    </a>
                                    <div class="p-3">
                                        <h6>
                                            <a href="{{ url('/recipes/' . $recipe->id) }}" class="text-dark text-decoration-none">
                                                <strong>{{ $recipe->title }}</strong>
                                            </a>
                                        </h6>
                                        <p class="text-muted small mb-2">
                                            <i class="fas fa-clock"></i> {{ $recipe->cooking_time ?? '30' }} menit
                                        </p>
                                        <p class="text-muted small">
                                            <i class="fas fa-user"></i> {{ $recipe->servings ?? '4' }} porsi
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $recipes->links() }}
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="alert alert-info">
                            <h4>Belum ada resep untuk kategori {{ $category->name }}</h4>
                            <p>Silakan cek kategori lain atau kembali ke halaman utama</p>
                            <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Home</a>

                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Back to Top Button -->
    <button class="btn btn-primary btn-floating" id="backToTop" style="position: fixed; bottom: 20px; right: 20px; display: none; z-index: 1000;">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    
    <script>
        // Back to top button
        window.addEventListener('scroll', function() {
            const backToTop = document.getElementById('backToTop');
            if (window.pageYOffset > 300) {
                backToTop.style.display = 'block';
            } else {
                backToTop.style.display = 'none';
            }
        });

        document.getElementById('backToTop').addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>

</html>