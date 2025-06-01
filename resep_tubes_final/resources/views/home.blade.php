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
    {{-- Ganti dari ./style.css ke Laravel asset helper --}}
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Dapur Digital - Home</title>
</head>

<body>
<!-- nav section start -->
<nav class="navbar navbar-expand-lg sticky-top bg-white shadow">
    <div class="container">
        <a class="navbar-brand" href="#home">Dapur Digital</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            {{-- Ganti path gambar ke Laravel asset --}}
            <img src="{{ asset('images/hamburger.png') }}" alt="Menu" class="hamburger-icon">
        </button>
        
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav m-auto my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#Home">Home</a>
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
<!-- nav section end -->

    <!-- section of main -->
    <section id="Home" class="main">
        <div class="container py-4">
            <div class="row py-4">
                <div class="col-lg-12 pt-6 text-center"></div>
                <h1 class="outlined-text pt-5">Dari Dapur ke Meja: Resep Lezat, Mudah, dan Inspiratif!</h1>
                <p style="text-align: justify;" >Dapur Digital adalah website resep masakan yang menyajikan berbagai hidangan lezat,
                mudah dibuat, dan penuh inspirasi. Dengan panduan langkah demi langkah, tips memasak, 
                serta rekomendasi bahan, website ini cocok untuk pemula hingga koki berpengalaman. 
                Temukan resep harian, menu spesial, dan ide kreatif untuk menghidangkan makanan terbaik langsung dari dapur ke meja Anda! 🍽✨</p>
                {{-- Ganti link PHP ke Laravel route --}}
                <a href="{{ route('recipes.create') }}">
                </a>
            </div>
        </div>
    </section>
    <!--================== ICON FITUR =================-->
    <section id="Fitur" class="fitur">
        <div class="categories-container">
            @foreach($categories as $category)
                <div class="category-item">
                    <a href="{{ route('categories.show', $category->id) }}" class="category-link">
                        <img src="{{ $category->image_url }}" alt="{{ $category->name }}">
                        <span>{{ $category->name }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <!--================== GAMBAR DAN RESEP =================-->
    <section id="Recipe" class="fitur">
        <div class="container py-5">
            <div class="row pt-5">
                <div class="col-lg-5 m-auto text-center">
                    <h1>Resep Pilihan, Mau masak apa?</h1>
                    <h6 style="color: maroon;">Health With Cooking</h6>
                </div>
                <div class="row">
    @foreach ($recipes as $recipe)
    <div class="col-lg-3 text-center">
        <div class="card border-0 bg-light mb-2">
            <div class="card-body">
                <a href="{{ url('/recipes/' . $recipe->id) }}">
                    <img src="{{ asset('storage/' . $recipe->image) }}" class="img-resep" alt="{{ $recipe->title }}">
                </a>
            </div>
        </div>
        <h6>
            <a href="{{ url('/recipes/' . $recipe->id) }}" class="text-dark">
                <strong>{{ $recipe->title }}</strong>
            </a>
        </h6>
    </div>
@endforeach

</div>

                <div class="row py-5">
                    <div class="col-12 text-center">
                        {{-- Ganti link PHP ke Laravel route --}}
                        <a href="{{ route('recipes.create') }}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>


    <!--================== TENTANG WEB KITA =================-->
    <section id="About" class="about-section">
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-lg-5 m-auto text-center">
                    <h1>Tentang Dapur Digital</h1>
                    <h6 style="color: maroon;">Health With Cooking</h6>
                </div>
                <style>
                    .equal-img {
                        width: 100%;
                        height: 300px;
                        object-fit: cover;
                    }
                </style>

                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('images/cowoku.jpg') }}" class="img-fluid equal-img mb-3">
                        <h5>Byeon Woo Seok</h5>
                        <p style="text-align: justify;">Menggunakan web Dapur Digital memberikan pengalaman yang
                            intuitif dan menyenangkan.
                            Desainnya yang bersih dan navigasi yang mudah membuat saya bisa menemukan
                            resep favorit dengan cepat. Setiap resep disajikan dengan gambar yang menarik serta
                            instruksi yang jelas,
                            sehingga saya merasa percaya diri dalam mencoba memasak berbagai hidangan baru.
                            Pengalaman ini membuat memasak menjadi lebih menyenangkan dan tidak membingungkan.
                        </p>
                    </div>

                    <div class="col-lg-6">
                        <img src="{{ asset('images/cewe.jpg') }}" class="img-fluid equal-img mb-3">
                        <h5>Go Yoon Jung</h5>
                        <p style="text-align: justify;">Sebagai seseorang yang suka memasak, web Dapur Digital sangat
                            membantu saya dalam menemukan resep
                            yang sesuai dengan selera dan kebutuhan saya. Fitur pencarian dan kategori resep yang
                            terorganisir dengan baik
                            memudahkan saya dalam menjelajahi berbagai pilihan makanan. Dengan tampilan yang estetis dan
                            interaktif,
                            pengalaman memasak menjadi lebih inspiratif dan membuat saya semakin menikmati proses
                            memasak di dapur.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!--================== KONTAK =================-->
    <section id="Contact" class="contact py-5-section">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-5 m-auto text-center">
                    <h1>Contact Us</h1>
                    <h6 style="color: maroon;">Jalin Silaturahmi</h6>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-lg-9 m-auto">
                    <div class="row">
                        <div class="col-lg-4">
                            <h5>Location</h5>
                            <p>Dimana lokasi Anda?</p>

                            <h5>Phone</h5>
                            <p>Nomor WhatsApp Anda?</p>

                            <h5>Email</h5>
                            <p>Apa alamat email Anda?</p>
                        </div>
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <input type="text" class="form-control bg-light" placeholder="First Name">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <input type="text" class="form-control bg-light" placeholder="Last Name">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <input type="text" class="form-control bg-light" placeholder="Nomor">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <input type="text" class="form-control bg-light" placeholder="Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <textarea class="form-control bg-light" placeholder="Your Message" cols="30"
                                        rows="5"></textarea>
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-lg-12 text-center">
                                    <button class="btn2 btn-primary">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================== JOIN KOMUNITAS =================-->
    <section class="news py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-9 m-auto text-center">
                    <h1 style="font-family: roboto;" >Dapur Digital, akan membantu anda!</h1>
                    <div class="input-group rounded-pill overflow-hidden">
                    <input type="text" class="form-control" placeholder="Apa yang kamu ingin buat?" />
                    <button class="btn-submit">Submit</button>
                    </div>
                </div>
            </div>

            <!-- Informasi dan Media Sosial -->
            <div class="row">
                <div class="col-lg-9 m-auto text-center">
                    <div class="row py-3">
                        <div class="col-md-3">
                            <h5 style="font-family: roboto;" class="pb-3">RESEP FAVORIT</h5>
                            <p>Nasi Goreng Special</p>
                            <p>Ayam Bakar Madu</p>
                            <p>Sop Iga Sapi</p>
                        </div>
                        <div class="col-md-3">
                            <h5 style="font-family: roboto;" class="pb-3">KATEGORI MASAKAN</h5>
                            <p>Masakkan Nusantara</p>
                            <p>Masakkan Western</p>
                            <p>Kue dan Dessert</p>
                        </div>
                        <div class="col-md-3">
                            <h5 style="font-family: roboto;" class="pb-3">TIPS DAPUR</h5>
                            <p>Cara Memasak Diet Friendly</p>
                            <p>Rahasia Sambal Enak</p>
                            <p>Tips Memasak Cepat</p>
                        </div>
                        <div class="col-md-3">
                            <h5 style="font-family: roboto;" class="pb-3">Temukan resep terbaru kami di:</h5>
                            <div class="social-icons d-flex justify-content-center gap-3">
                                <a href="https://www.instagram.com" target="_blank">
                                    <img src="{{ asset('images/instagram (1).png') }}" alt="Instagram" width="40">
                                </a>
                                <a href="https://www.twitter.com" target="_blank">
                                    <img src="{{ asset('images/twitter.png') }}" alt="Twitter" width="40">
                                </a>
                                <a href="https://www.pinterest.com" target="_blank">
                                    <img src="{{ asset('images/pinterest.png') }}" alt="Pinterest" width="40">
                                </a>
                                <a href="https://wa.me/yourphonenumber" target="_blank">
                                    <img src="{{ asset('images/social.png') }}" alt="WhatsApp" width="40">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <p style="font-family: roboto;" class="text-center">Memasak itu seni, dan dapur adalah kanvasnya!!</p>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
        <script>
            // Script ini mungkin perlu disesuaikan dengan Laravel routing
            document.querySelector(".btn1.mt-1")?.addEventListener("click", function(event) {
                event.preventDefault();
                window.location.href = "{{ route('recipes.create') }}";
            });
        </script>        
</body>

</html>