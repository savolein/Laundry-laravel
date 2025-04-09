<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuci Cuy - Laundry Kekinian</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/inicss.css') }}" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('foto/logo_laundry.png') }}" alt="Logo" style="height: 40px; margin-right: 10px;">
                <span style="font-weight: bold;">Cuci Cuy</span>
            </a>
    
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="#services">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('customer.orders.history')}}">History</a></li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    
    <!-- Hero Section -->
    <header class="hero">
        <video autoplay muted loop>
            <source src="{{ asset('video/background.mp4') }}" type="video/mp4">
        </video>
        <div class="container">
            <h1>Selamat Datang di Cuci Cuy</h1>
            <p id="changingText">Laundry cepat, bersih, dan terpercaya!</p>
            <a href="{{ route('customer.laundry.types') }}" class="btn btn-custom">Lihat Layanan</a>
        </div>
    </header>
    
    <!-- Features Section -->
    <section id="services" class="container my-5">
    <div class="feature-container">
        <div class="feature-box">
            <i class="fas fa-tshirt fa-2x"></i>
            <h4>Cuci Kering</h4>
            <p>Pakaian bersih dan wangi dalam waktu singkat.</p>
        </div>
        <div class="feature-box">
            <i class="fas fa-bolt fa-2x"></i>
            <h4>Express Service</h4>
            <p>Butuh cepat? Kami siap melayani dalam hitungan jam.</p>
        </div>
        <div class="feature-box">
            <i class="fas fa-recycle fa-2x"></i>
            <h4>Eco-Friendly</h4>
            <p>Menggunakan bahan ramah lingkungan dan aman.</p>
        </div>
    </div>

    <section class="laundry-description container mt-4">
  <h5>Tipe Laundry:</h5>

  <div class="tipe fade-in kanan hide">
    <h6><strong>1. Reguler:</strong></h6>
    <ul>
      <li>Cuci dengan mesin otomatis</li>
      <li>Penggunaan deterjen dan pewangi standar</li>
      <li>Pengeringan menggunakan mesin</li>
      <li>Setrika rapi</li>
      <li>Lipat dan pengemasan plastik</li>
    </ul>
  </div>

  <div class="tipe fade-in kiri hide">
    <h6><strong>2. Express:</strong></h6>
    <ul>
      <li>Cuci cepat dengan mesin premium</li>
      <li>Pewangi dan deterjen berkualitas tinggi</li>
      <li>Pengeringan cepat</li>
      <li>Setrika uap</li>
      <li>Pengemasan rapi dalam plastik tebal</li>
    </ul>
  </div>

  <div class="tipe fade-in kanan hide">
    <h6><strong>3. VIP:</strong></h6>
    <ul>
      <li>Cuci terpisah per pelanggan (tidak dicampur)</li>
      <li>Deterjen khusus sesuai jenis kain</li>
      <li>Pewangi premium tahan lama</li>
      <li>Setrika profesional (uap + manual sesuai jenis pakaian)</li>
      <li>Lipat/penggantung sesuai permintaan</li>
      <li>Pengemasan dalam garment bag (tas laundry)</li>
    </ul>
  </div>
</section>


<script>
document.addEventListener("DOMContentLoaded", function() {
    const fadeElement = document.querySelector(".fade-up");

    const fadeObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show");
                entry.target.classList.remove("hide");
            } else {
                entry.target.classList.remove("show");
                entry.target.classList.add("hide");
            }
        });
    }, { threshold: 0.1 });

    fadeObserver.observe(fadeElement);
});
</script>

</section>

<!-- Tentang Section -->
<section id="tentang" class="container my-5">
    <h2 class="text-center mb-4">Tentang Kami</h2>
    <p class="text-center mb-5">
    Cuci Cuy telah dipercaya oleh banyak pelanggan karena kualitas layanan yang sangat luar biasa dan konsisten. Kami senantiasa mengutamakan kepuasan pelanggan dengan memberikan hasil cucian yang bersih, harum, dan rapi. Dalam setiap proses pencucian, kami menggunakan bahan-bahan ramah lingkungan yang telah teruji keamanannya untuk semua jenis kain, termasuk bahan sensitif sekalipun. Selain itu, kami juga menerapkan teknologi pencucian terbaru guna menjamin hasil terbaik, cepat, dan efisien. Komitmen kami terhadap kualitas telah terbukti dari banyaknya review positif dan testimoni yang diberikan oleh pelanggan yang merasa puas dengan pelayanan kami.
    </p>

    <div class="review-carousel-wrapper">
        <div class="review-carousel d-flex">
            <!-- Review cards akan dimasukkan dengan JavaScript -->
        </div>
    </div>
</section>


<!-- Popup Iklan -->
<div id="popup-iklan">
    <span class="close-btn" onclick="closeIklan()">✖</span>
    <img src="{{ asset('foto/gambar_iklan.jpg') }}" alt="Iklan Promo">
    <button class="promo-btn" onclick="ambilPromo()">Ambil Promo!</button>
</div>

<script>
function closeIklan() {
    document.getElementById("popup-iklan").style.display = "none";
}

function ambilPromo() {
    window.location.href = "{{ route('customer.reservation.form') }}";
}

setTimeout(() => {
    document.getElementById("popup-iklan").style.display = "flex";
}, 10000); 
</script>

<!-- Kontak Section -->
<section id="contact" class="container my-5 fade-in">
    <h2 class="text-center mb-4">Hubungi Kami</h2>
    <div class="row">
        <div class="col-md-6 mb-4">
            <h5><i class="fab fa-whatsapp"></i> WhatsApp</h5>
            <p><a href="https://wa.me/6281237780483" target="_blank">+62 812-3778-0483</a></p>
            
            <h5><i class="fab fa-instagram"></i> Instagram</h5>
            <p><a href="https://instagram.com/expors.ofc" target="_blank">@expors.ofc</a></p>
            
            <h5><i class="fas fa-envelope"></i> Email</h5>
            <p><a href="mailto:stfiegloria@gmail.com">stfiegloria@gmail.com</a></p>
        </div>
        <div class="col-md-6">
            <h5><i class="fas fa-map-marker-alt"></i> Lokasi</h5>
            <div class="embed-responsive embed-responsive-4by3">
                <iframe class="embed-responsive-item" 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.446462477003!2d115.20375397588497!3d-8.159767081415409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2198b0b22402b%3A0xe04050f86f3a1696!2sSMK%20Wira%20Harapan!5e0!3m2!1sen!2sid!4v1712468552551!5m2!1sen!2sid" 
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>



<!-- Footer Tetap Ada -->
<footer class="footer">
    <p>&copy; 2025 Cuci Cuy. All Rights Reserved.</p>
</footer>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const featureBoxes = document.querySelectorAll(".feature-box");

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                }
            });
        }, { threshold: 0.2 });

        featureBoxes.forEach(box => observer.observe(box));
    });
</script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script for navbar transition & changing text -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector(".navbar").classList.add("show");
        });

        window.addEventListener("scroll", function() {
            let navbar = document.querySelector(".navbar");
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });

        const texts = ["Laundry cepat, bersih, dan terpercaya!", "Harga terbaik untuk kualitas terbaik!", "Pakaian bersih, hati senang!"];
        let index = 0;
        setInterval(() => {
            document.getElementById("changingText").textContent = texts[index];
            index = (index + 1) % texts.length;
        }, 5000);
    </script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const featureBoxes = document.querySelectorAll(".feature-box");

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show"); 
                entry.target.classList.remove("hide"); 
            } else {
                entry.target.classList.add("hide"); 
            }
        });
    }, { threshold: 0.2 });

    featureBoxes.forEach(box => observer.observe(box));
});
</script>



<script>
    const reviews = [
        { name: "Adi", img: "https://i.pravatar.cc/60?img=1", text: "Layanan cepat dan bersih. Sangat recommended!" },
        { name: "Sharon", img: "https://i.pravatar.cc/60?img=2", text: "Ramah lingkungan banget, cucian jadi wangi dan aman." },
        { name: "Bhakta", img: "https://i.pravatar.cc/60?img=3", text: "Udah langganan dari lama, selalu puas!" },
        { name: "Stefie", img: "https://i.pravatar.cc/60?img=4", text: "Pelayanan super cepat dan hasil maksimal." },
        { name: "Eko", img: "https://i.pravatar.cc/60?img=5", text: "Bajuku ditangani dengan rapi, top markotop!" },
        { name: "Fajar", img: "https://i.pravatar.cc/60?img=6", text: "Pakaiannya jadi kayak baru, suka banget!" },
        { name: "Gita", img: "https://i.pravatar.cc/60?img=7", text: "Nyaman banget, dan bersihnya bukan main!" },
        { name: "Hani", img: "https://i.pravatar.cc/60?img=8", text: "Laundry favorit aku pokoknya!" },
        { name: "Ivan", img: "https://i.pravatar.cc/60?img=9", text: "Harga oke, pelayanan memuaskan." },
        { name: "Joko", img: "https://i.pravatar.cc/60?img=10", text: "Sudah pasti jadi langganan tetap." },
        { name: "Kiki", img: "https://i.pravatar.cc/60?img=11", text: "Dikasih parfum yang aku suka. Mantap!" },
        { name: "Lina", img: "https://i.pravatar.cc/60?img=12", text: "Staffnya ramah dan profesional." },
        { name: "Maya", img: "https://i.pravatar.cc/60?img=13", text: "Sepatuku kinclong banget abis dicuci di sini!" },
        { name: "Nina", img: "https://i.pravatar.cc/60?img=14", text: "Wangi dan lembut bajunya. Aku cinta Cuci Cuy!" },
        { name: "Oka", img: "https://i.pravatar.cc/60?img=15", text: "Ga nyangka laundry bisa se-eco ini." }
    ];

    const carousel = document.querySelector('.review-carousel');
    let reviewIndex = 0;

    function renderReviews(start) {
        carousel.innerHTML = '';
        for (let i = 0; i < 3; i++) {
            const review = reviews[(start + i) % reviews.length];
            const div = document.createElement('div');
            div.className = 'review-card';
            div.innerHTML = `
                <img src="${review.img}" alt="${review.name}">
                <h5>${review.name}</h5>
                <p>"${review.text}"</p>
            `;
            carousel.appendChild(div);
        }
    }

    renderReviews(reviewIndex);

    setInterval(() => {
        reviewIndex = (reviewIndex + 3) % reviews.length;
        carousel.style.transform = "translateX(100%)"; 
        setTimeout(() => {
            renderReviews(reviewIndex); // ini buat ganti isi jan di hapus we
            carousel.style.transition = "none";
            carousel.style.transform = "translateX(-100%)"; 
            setTimeout(() => {
                carousel.style.transition = "transform 1s ease-in-out";
                carousel.style.transform = "translateX(0)"; // geser masuk
            }, 50);
        }, 1000);
    }, 5000);
</script>

<script>
   //ini transisi kontak sama lokasi
    const faders = document.querySelectorAll('.fade-in');

    const appearOptions = {
        threshold: 0.2,
        rootMargin: "0px 0px -50px 0px"
    };

    const appearOnScroll = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('show');
            observer.unobserve(entry.target);
        });
    }, appearOptions);

    faders.forEach(fader => {
        appearOnScroll.observe(fader);
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    @if(session('success'))
    Swal.fire({
        title: 'Success!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
    @endif
});
</script>


<script>
  const tipeElements = document.querySelectorAll('.tipe');

  function checkScroll() {
    tipeElements.forEach(el => {
      const rect = el.getBoundingClientRect();
      const isVisible = rect.top < window.innerHeight && rect.bottom > 0;

      if (isVisible) {
        el.classList.add('show');
      } else {
        el.classList.remove('show');
      }
    });
  }

  window.addEventListener('scroll', checkScroll);
  window.addEventListener('load', checkScroll);
</script>


</body>
</html>