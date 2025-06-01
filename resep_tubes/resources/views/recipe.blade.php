<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:wght@400;600&family=Merriweather:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c26cd2166c.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>{{ $recipe->title }} - Dapur Digital</title>
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

    <!-- Konten Utama -->
    <main class="container">
        <section class="intro">
            <div class="info-resep">
                <!-- Kiri: Deskripsi -->
                <div class="info-kiri">
                    <h1>{{ $recipe->title }}</h1>
                    <p class="penulis">Kategori: {{ $recipe->category->name ?? 'Tidak ada' }}</p>
                    <p class="deskripsi">{{ $recipe->description }}</p>
                    
                    <!-- Info Waktu -->
                    <div class="waktu">
                        <div class="waktu-item">
                            <h3>Persiapan</h3>
                            <p>15 menit</p>
                        </div>
                        <div class="waktu-item">
                            <h3>Memasak</h3>
                            <p>30 menit</p>
                        </div>
                        <div class="waktu-item">
                            <h3>Porsi</h3>
                            <p>4 orang</p>
                        </div>
                    </div>
                </div>

                <!-- Kanan: Gambar -->
                <div class="info-kanan">
                    @if($recipe->image)
                        <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}">
                    @else
                        <p>Tidak ada gambar di database</p>
                    @endif
                </div>
            </div>
        </section>

        <div class="bagi-dua">
            <!-- Kiri: Bahan dan Alat -->
            <section class="panel">
                <h2>Bahan dan Alat</h2>
                <ul>
                    @foreach($recipe->details as $detail)
                        @foreach($detail->getIngredientsArray() as $ingredient)
                            <li>{{ $ingredient }}</li>
                        @endforeach
                    @endforeach
                </ul>
            </section>

            <!-- Kanan: Langkah Memasak -->
            <section class="langkah">
                <h2>Langkah-langkah Memasak</h2>
                <ol>
                    @foreach($recipe->details as $detail)
                        @foreach($detail->getStepsArray() as $step)
                            <li>{{ $step }}</li>
                        @endforeach
                    @endforeach
                </ol>
            </section>  
        </div>
    </main>

    <script>
        // Search functionality
        document.querySelector('.search-btn').addEventListener('click', function() {
            const searchTerm = document.querySelector('.search-box').value;
            if (searchTerm.trim() !== '') {
                // Implement search logic here
                console.log('Searching for:', searchTerm);
            }
        });

        // Save recipe functionality
        document.querySelector('.save-btn').addEventListener('click', function() {
            // Implement save logic here
            alert('Resep disimpan!');
        });

        // Enter key search
        document.querySelector('.search-box').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                document.querySelector('.search-btn').click();
            }
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>