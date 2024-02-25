<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <title>PUSKESMAS HOGA</title>
</head>

<body>
    <!-- Navbar Start -->
    <header>
        <section id="home">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="#">PuskesmasHoga</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#information">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#contact">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#location">Location</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?= base_url('login'); ?>">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
    </header>
    <!-- Navbar End -->
    <!-- Carousel Start -->
    <section class="hero" id="hero">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/landing_page_1.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h5 class="animated bounceInRight" style="animation-delay: 1s;">Welcome To Website</h5>
                        <p class="animated bounceInLeft d-none d-md-block" style="animation-delay: 2s;">
                            Mari kita tingkatkan kesadaran akan kebutuhan pangan yang sehat dan penuh gizi untuk
                            keluarga</p>
                        <div class="buttons">
                            <a href="#contact" class="button1">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/landing_page_2.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h5 class="animated bounceInRight" style="animation-delay: 1s;">Welcome To Website</h5>
                        <p class="animated bounceInLeft d-none d-md-block" style="animation-delay: 2s;">
                            Tak bisa merasa aman, bila kau tak memenuhi dua hal. Yakni sehat dan kaya. Bila kayamu
                            karena hasil usahamu, maka sehat adalah hasil dari menjaga gizi</p>
                        <div class="buttons">
                            <a href="" class="button1">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- Carousel End -->
    <!-- feature info section start -->
    <section class="feature" id="information">
        <div class="container">
            <div class="box">
                <div class="icon">
                    <img src="img/icon.png" alt="">
                </div>
                <div class="content">
                    <h3>Information</h3>
                    <p>Pelaksanaan Posyandu dilaksanakan setiap bulan pada <strong>Tanggal 15</strong></p>
                    <br>
                    <br><br><br><br>
                    <a href="#">Read More</a>
                </div>
            </div>
            <div class="box">
                <div class="icon">
                    <img src="img/icon.png" alt="">
                </div>
                <div class="content">
                    <h3>Information</h3>
                    <p>Manfaat Mengikuti Kegiatan Posyandu : </p>
                    <p>Memberikan beragam informasi mengenai kesehatan ibu dan anak, seperti pemberian ASI, MPASI, dan pencegahan penyakit
                        Memantau tumbuh kembang anak. </p>
                    <a href="http://binapemdes.kemendagri.go.id/blog/detil/575-kegiatan-posyandu-dan-manfaatnya-bagi-ibu-dan-anak#:~:text=Tujuan%20utama%20posyandu%20adalah%20mencegah,setidaknya%201%20kali%20dalam%20sebulan.">Read More</a>
                </div>
            </div>
            <div class="box">
                <div class="icon">
                    <img src="img/icon.png" alt="">
                </div>
                <div class="content">
                    <h3>Information</h3>
                    <p>Sosialisasi terkait gizi anak yang akan dilaksanakan pada <strong>Tanggal 05 Agustus 2023</strong></p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- feature info section End -->
    <!-- contact us and location Start -->
    <section class="contact-pusat" id="contact">
        <div class="title">
            <h2>Get In Touch</h2>
        </div>
        <div class="box1">
            <!-- form box -->
            <div class="contact form">
                <h3>Send a masagge</h3>
                <form>
                    <div class="formBox">
                        <div class="row50">
                            <div class="inputBox">
                                <span>First Name</span>
                                <input type="text" placeholder="Rahmat">
                            </div>
                            <div class="inputBox">
                                <span>Last Name</span>
                                <input type="text" placeholder="Zulwan">
                            </div>
                        </div>
                        <div class="row50">
                            <div class="inputBox">
                                <span>Email Akun</span>
                                <input type="text" placeholder="rahmat@gmail.com">
                            </div>
                            <div class="inputBox">
                                <span>Mobile</span>
                                <input type="text" placeholder="+62 822 9136 5309">
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBox">
                                <span>Mesagge</span>
                                <textarea placeholder="Write Your Mesagge Here.."></textarea>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBox">
                                <input type="submit" value="Send" class="submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- info box -->
            <div class="contact info">
                <h3>Contact Info</h3>
                <div class="infoBox">
                    <div>
                        <span class="lokasi">
                            <ion-icon name="location"></ion-icon>
                        </span>
                        <p>Sulawesi Tenggara, Kab Wakatobi, Kec. Kaledupa, Desa Samabahari <br>PUSKESMAS HOGA</p>
                    </div>
                    <div>
                        <span>
                            <ion-icon name="mail"></ion-icon>
                        </span>
                        <a href="mailto:rahmatzulwan542@gmail.com">rahmatzulwan542@gmail.com</a>
                    </div>
                    <div>
                        <span>
                            <ion-icon name="call"></ion-icon>
                        </span>
                        <a href="tel:+6282291365309">+62 822 9136 5309</a>
                    </div>

                    <!-- sosial media -->
                    <ul class="sci">
                        <li><a href="#">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a></li>
                        <li><a href="#">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a></li>
                        <li><a href="#">
                                <ion-icon name="logo-whatsapp"></ion-icon>
                            </a></li>
                    </ul>
                </div>
            </div>
            <!-- map box -->
            <div class="contact map" id="location">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.440931052673!2d123.7515193050599!3d-5.501356865630341!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2da6d97b14705341%3A0x315a55ab73cf4d3e!2sPuskesmas%20Kaledupa!5e0!3m2!1sid!2sid!4v1684894293342!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <!-- contact us and location End -->
    <!-- Bootstrap JS -->
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Js Icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>