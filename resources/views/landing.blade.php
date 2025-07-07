<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMKN 1 KOTO BARU - Website Resmi</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome (Ikon) -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

  <!-- Tailwind Custom Config -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#14532d',     // hijau tua elegan
            secondary: '#facc15',   // kuning emas untuk aksen
            neutral: '#f3f4f6'      // abu terang
          },
          fontFamily: {
            inter: ['Inter', 'sans-serif'],
          }
        }
      }
    }
  </script>

  <!-- Google Font: Inter -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

  <!-- Favicon (optional) -->
  <link rel="icon" type="image/png" href="{{ asset('logo-smk.png') }}" />

  <style>
    body {
      font-family: 'Inter', sans-serif;
      scroll-behavior: smooth;
    }
  </style>
</head>

<body class="bg-gray-50">
    <!-- Header -->
<header class="bg-white shadow-md sticky top-0 z-50 w-full">
    <!-- Top Bar -->
    <div class="bg-primary text-white py-2 text-sm px-4 w-full">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <span><i class="fas fa-phone mr-2"></i>(0754) 123456</span>
                <span><i class="fas fa-envelope mr-2"></i>info@smkn1kotobaru.sch.id</span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="#" class="hover:text-yellow-300"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-yellow-300"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-yellow-300"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="py-4 px-4 w-full bg-white">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('hero.jpg') }}" alt="Logo SMKN 1 KOTO BARU" class="h-16 w-16 rounded">
                <div>
                    <h1 class="text-2xl font-bold text-primary">SMKN 1 KOTO BARU</h1>
                    <p class="text-sm text-gray-600">Jl. Pinang Gadang, Kec. Koto Baru, Dharmasraya</p>
                </div>
            </div>
            <!-- Mobile Menu Button -->
            <button class="md:hidden" onclick="toggleMobileMenu()">
                <i class="fas fa-bars text-2xl text-primary"></i>
            </button>
        </div>
    </div>

    <!-- Navigation -->
    <div class="border-t border-gray-200 px-4 w-full bg-white">
        <nav class="hidden md:block max-w-7xl mx-auto">
            <ul class="flex space-x-8 py-4">
                <li><a href="#beranda" class="text-primary font-semibold hover:text-secondary transition">Beranda</a></li>
                <li class="relative group">
                    <a href="#profil" class="hover:text-primary transition flex items-center">
                        Profil <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </a>
                    <ul class="absolute top-full left-0 bg-white shadow-lg rounded-md py-2 w-48 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50">
                        <li><a href="#sejarah" class="block px-4 py-2 hover:bg-gray-100">Sejarah</a></li>
                        <li><a href="#visi-misi" class="block px-4 py-2 hover:bg-gray-100">Visi & Misi</a></li>
                        <li><a href="#struktur" class="block px-4 py-2 hover:bg-gray-100">Struktur Organisasi</a></li>
                    </ul>
                </li>
                <li><a href="#akademik" class="hover:text-primary transition">Akademik</a></li>
                <li><a href="#fasilitas" class="hover:text-primary transition">Fasilitas</a></li>
                <li><a href="#berita" class="hover:text-primary transition">Berita</a></li>
                <li><a href="#galeri" class="hover:text-primary transition">Galeri</a></li>
                <li><a href="#kontak" class="hover:text-primary transition">Kontak</a></li>
                <li><a href="/login" class="hover:text-primary transition">Login</a></li>
            </ul>
        </nav>
    </div>

    <!-- Mobile Navigation -->
    <div id="mobileMenu" class="md:hidden hidden border-t border-gray-200 px-4 w-full bg-white">
        <ul class="py-4 space-y-2">
            <li><a href="#beranda" class="block py-2 text-primary font-semibold">Beranda</a></li>
            <li><a href="#sejarah" class="block py-2 hover:text-primary">Sejarah</a></li>
            <li><a href="#visi-misi" class="block py-2 hover:text-primary">Visi & Misi</a></li>
            <li><a href="#struktur" class="block py-2 hover:text-primary">Struktur Organisasi</a></li>
            <li><a href="#akademik" class="block py-2 hover:text-primary">Akademik</a></li>
            <li><a href="#fasilitas" class="block py-2 hover:text-primary">Fasilitas</a></li>
            <li><a href="#berita" class="block py-2 hover:text-primary">Berita</a></li>
            <li><a href="#galeri" class="block py-2 hover:text-primary">Galeri</a></li>
            <li><a href="#kontak" class="block py-2 hover:text-primary">Kontak</a></li>
        </ul>
    </div>
</header>





    <!-- Hero Section -->
<section id="beranda"
         class="relative bg-[url('/hero.jpg')] bg-cover bg-center text-white min-h-[80vh]">
    <!-- Overlay hitam transparan -->
    <div class="absolute inset-0 bg-black opacity-40"></div>

    <!-- Konten Utama -->
    <div class="relative container mx-auto px-4 py-24 text-center z-10">
        <h2 class="text-4xl md:text-6xl font-bold mb-4">Selamat Datang di SMKN 1 KOTO BARU</h2>
        <p class="text-lg md:text-2xl mb-8">Mencetak Tenaga Kerja Siap Pakai, Unggul & Berkarakter</p>

        <div class="flex flex-col md:flex-row justify-center gap-4">
            <a href="#profil"
               class="bg-secondary hover:bg-yellow-600 text-white px-8 py-3 rounded-lg font-semibold transition duration-300">
                Tentang Kami
            </a>
            <a href="#akademik"
               class="border-2 border-white text-white hover:bg-white hover:text-primary px-8 py-3 rounded-lg font-semibold transition duration-300">
                Program Keahlian
            </a>
        </div>
    </div>
</section>



    <!-- Quick Info -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="text-center p-6 bg-gray-50 rounded-lg">
                <i class="fas fa-users text-4xl text-primary mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-800">1000+</h3>
                <p class="text-gray-600">Siswa Aktif</p>
            </div>
            <div class="text-center p-6 bg-gray-50 rounded-lg">
                <i class="fas fa-chalkboard-teacher text-4xl text-primary mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-800">75+</h3>
                <p class="text-gray-600">Tenaga Pengajar</p>
            </div>
            <div class="text-center p-6 bg-gray-50 rounded-lg">
                <i class="fas fa-trophy text-4xl text-primary mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-800">45+</h3>
                <p class="text-gray-600">Prestasi Akademik & Non-Akademik</p>
            </div>
            <div class="text-center p-6 bg-gray-50 rounded-lg">
                <i class="fas fa-building text-4xl text-primary mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-800">30+</h3>
                <p class="text-gray-600">Ruang Kelas & Praktikum</p>
            </div>
        </div>
    </div>
</section>


    <!-- About Section -->
   <section id="profil" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Tentang SMKN 1 KOTO BARU</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                SMK Negeri 1 Koto Baru berkomitmen mencetak lulusan kompeten, berakhlak mulia, dan siap bersaing di dunia kerja maupun dunia usaha.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <img src="/hero.jpg" alt="SMKN 1 Koto Baru" class="rounded-lg shadow-lg w-full">
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Visi & Misi</h3>

                <div class="mb-6">
                    <h4 class="text-xl font-semibold text-primary mb-3">Visi</h4>
                    <p class="text-gray-600 leading-relaxed">
                        Menjadi SMK unggulan dalam menghasilkan tamatan yang beriman, berdaya saing tinggi, dan siap kerja secara profesional.
                    </p>
                </div>

                <div>
                    <h4 class="text-xl font-semibold text-primary mb-3">Misi</h4>
                    <ul class="text-gray-600 space-y-2">
                        <li class="flex items-start"><i class="fas fa-check text-primary mr-2 mt-1"></i>Meningkatkan kualitas pembelajaran berbasis industri</li>
                        <li class="flex items-start"><i class="fas fa-check text-primary mr-2 mt-1"></i>Mengembangkan karakter dan etos kerja peserta didik</li>
                        <li class="flex items-start"><i class="fas fa-check text-primary mr-2 mt-1"></i>Membina hubungan kerja sama dengan dunia usaha dan industri</li>
                        <li class="flex items-start"><i class="fas fa-check text-primary mr-2 mt-1"></i>Mengembangkan sarana dan prasarana pembelajaran yang modern</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Programs Section -->
<!-- Programs Section -->
<section id="akademik" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Program Keahlian</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Jurusan unggulan untuk membekali siswa dengan keahlian siap kerja</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gray-50 p-6 rounded-lg hover:shadow-lg transition">
                <i class="fas fa-desktop text-4xl text-primary mb-4"></i>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Rekayasa Perangkat Lunak (RPL)</h3>
                <p class="text-gray-600">Mengembangkan keterampilan dalam pemrograman, desain UI/UX, dan software engineering.</p>
            </div>
            <div class="bg-gray-50 p-6 rounded-lg hover:shadow-lg transition">
                <i class="fas fa-network-wired text-4xl text-primary mb-4"></i>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Teknik Komputer & Jaringan (TKJ)</h3>
                <p class="text-gray-600">Fokus pada jaringan komputer, troubleshooting, dan infrastruktur IT.</p>
            </div>
            <div class="bg-gray-50 p-6 rounded-lg hover:shadow-lg transition">
                <i class="fas fa-briefcase text-4xl text-primary mb-4"></i>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Bisnis Daring & Pemasaran</h3>
                <p class="text-gray-600">Mempersiapkan siswa dalam dunia usaha, digital marketing, dan kewirausahaan.</p>
            </div>
        </div>
    </div>
</section>


<!-- News Section -->
<section id="berita" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Berita & Pengumuman</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Informasi terbaru seputar kegiatan dan prestasi siswa</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="/hero.jpg" alt="Prestasi" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="text-sm text-primary font-semibold">15 Juni 2025</span>
                    <h3 class="text-xl font-bold text-gray-800 mt-2 mb-3">Juara LKS Tingkat Kabupaten</h3>
                    <p class="text-gray-600 mb-4">Siswa jurusan TKJ SMKN 1 Koto Baru meraih juara 1 Lomba Kompetensi Siswa tingkat kabupaten...</p>
                    <a href="#" class="text-primary font-semibold hover:text-secondary transition">Baca Selengkapnya →</a>
                </div>
            </article>

            <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="/hero.jpg" alt="PPDB" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="text-sm text-primary font-semibold">10 Juni 2025</span>
                    <h3 class="text-xl font-bold text-gray-800 mt-2 mb-3">PPDB 2025/2026 Telah Dibuka</h3>
                    <p class="text-gray-600 mb-4">Pendaftaran Peserta Didik Baru tahun ajaran 2025/2026 SMKN 1 Koto Baru dibuka secara online dan offline...</p>
                    <a href="#" class="text-primary font-semibold hover:text-secondary transition">Baca Selengkapnya →</a>
                </div>
            </article>

            <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="/hero.jpg" alt="Ekskul" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="text-sm text-primary font-semibold">5 Juni 2025</span>
                    <h3 class="text-xl font-bold text-gray-800 mt-2 mb-3">Kegiatan Ekstrakurikuler Semester Ganjil</h3>
                    <p class="text-gray-600 mb-4">SMKN 1 Koto Baru menyelenggarakan berbagai kegiatan ekskul: Pramuka, Paskibra, PMR, dan lainnya...</p>
                    <a href="#" class="text-primary font-semibold hover:text-secondary transition">Baca Selengkapnya →</a>
                </div>
            </article>
        </div>
    </div>
</section>


    <!-- Facilities Section -->
<section id="fasilitas" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Fasilitas Sekolah</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Fasilitas lengkap untuk mendukung proses pembelajaran siswa kejuruan</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center p-4">
                <i class="fas fa-microscope text-4xl text-primary mb-3"></i>
                <h4 class="font-semibold text-gray-800">Lab Produktif</h4>
            </div>
            <div class="text-center p-4">
                <i class="fas fa-book text-4xl text-primary mb-3"></i>
                <h4 class="font-semibold text-gray-800">Perpustakaan</h4>
            </div>
            <div class="text-center p-4">
                <i class="fas fa-desktop text-4xl text-primary mb-3"></i>
                <h4 class="font-semibold text-gray-800">Lab Komputer</h4>
            </div>
            <div class="text-center p-4">
                <i class="fas fa-running text-4xl text-primary mb-3"></i>
                <h4 class="font-semibold text-gray-800">Lapangan Olahraga</h4>
            </div>
            <div class="text-center p-4">
                <i class="fas fa-utensils text-4xl text-primary mb-3"></i>
                <h4 class="font-semibold text-gray-800">Kantin Sehat</h4>
            </div>
            <div class="text-center p-4">
                <i class="fas fa-mosque text-4xl text-primary mb-3"></i>
                <h4 class="font-semibold text-gray-800">Mushola</h4>
            </div>
            <div class="text-center p-4">
                <i class="fas fa-car text-4xl text-primary mb-3"></i>
                <h4 class="font-semibold text-gray-800">Area Parkir</h4>
            </div>
            <div class="text-center p-4">
                <i class="fas fa-wifi text-4xl text-primary mb-3"></i>
                <h4 class="font-semibold text-gray-800">Akses WiFi</h4>
            </div>
        </div>
    </div>
</section>


    <!-- Contact Section -->
<section id="kontak" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Hubungi Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Informasi kontak dan lokasi SMKN 1 KOTO BARU</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Informasi Kontak</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-primary mr-4 mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-gray-800">Alamat</h4>
                                <p class="text-gray-600">
                                    Jl. Pinang Gadang, Desa/Kel. Koto Padang, <br>
                                    Kec. Koto Baru, Kab. Dharmasraya, Sumatera Barat
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-phone text-primary mr-4 mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-gray-800">Telepon</h4>
                                <p class="text-gray-600">(0754) 123456</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-envelope text-primary mr-4 mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-gray-800">Email</h4>
                                <p class="text-gray-600">info@smkn1kotobaru.sch.id</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-clock text-primary mr-4 mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-gray-800">Jam Operasional</h4>
                                <p class="text-gray-600">Senin - Jumat: 07:00 - 16:00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h3>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Nama</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Email</label>
                            <input type="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Subjek</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Pesan</label>
                            <textarea rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-primary hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Footer -->
<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <div class="flex items-center space-x-3 mb-4">
                    <img src="/hero.jpg" alt="Logo SMKN 1 Koto Baru" class="h-10 w-10">
                    <h3 class="text-xl font-bold">SMKN 1 KOTO BARU</h3>
                </div>
                <p class="text-gray-300 mb-4">
                    Sekolah Menengah Kejuruan Negeri 1 Koto Baru berkomitmen membentuk generasi unggul, siap kerja, berkarakter dan berwawasan global.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-facebook text-xl"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-instagram text-xl"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-youtube text-xl"></i></a>
                </div>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Menu Utama</h4>
                <ul class="space-y-2">
                    <li><a href="#beranda" class="text-gray-300 hover:text-white transition">Beranda</a></li>
                    <li><a href="#profil" class="text-gray-300 hover:text-white transition">Profil</a></li>
                    <li><a href="#akademik" class="text-gray-300 hover:text-white transition">Akademik</a></li>
                    <li><a href="#fasilitas" class="text-gray-300 hover:text-white transition">Fasilitas</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Informasi</h4>
                <ul class="space-y-2">
                    <li><a href="#berita" class="text-gray-300 hover:text-white transition">Berita</a></li>
                    <li><a href="#galeri" class="text-gray-300 hover:text-white transition">Galeri</a></li>
                    <li><a href="#kontak" class="text-gray-300 hover:text-white transition">Kontak</a></li>
                    <li><a href="/ppdb" class="text-gray-300 hover:text-white transition">PPDB</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                <div class="space-y-2 text-gray-300">
                    <p><i class="fas fa-map-marker-alt mr-2"></i>Jalan Pinang Gadang, Koto Padang, Kec. Koto Baru, Kab. Dharmasraya</p>
                    <p><i class="fas fa-phone mr-2"></i>(0754) 123456</p>
                    <p><i class="fas fa-envelope mr-2"></i>info@smkn1kotobaru.sch.id</p>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-8 text-center">
            <p class="text-gray-300">&copy; 2025 SMKN 1 KOTO BARU. Semua hak cipta dilindungi.</p>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<button id="backToTop" class="fixed bottom-6 right-6 bg-primary hover:bg-blue-700 text-white p-3 rounded-full shadow-lg opacity-0 invisible transition-all duration-300">
    <i class="fas fa-chevron-up"></i>
</button>

<script>
    // Tampilkan tombol back to top saat scroll
    window.addEventListener("scroll", function () {
        const button = document.getElementById("backToTop");
        if (window.scrollY > 300) {
            button.classList.remove("opacity-0", "invisible");
        } else {
            button.classList.add("opacity-0", "invisible");
        }
    });

    // Scroll ke atas saat diklik
    document.getElementById("backToTop").addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>


    <script>
        // Mobile Menu Toggle
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        }

        // Back to Top Button
        window.addEventListener('scroll', function() {
            const backToTop = document.getElementById('backToTop');
            if (window.pageYOffset > 300) {
                backToTop.classList.remove('opacity-0', 'invisible');
                backToTop.classList.add('opacity-100', 'visible');
            } else {
                backToTop.classList.add('opacity-0', 'invisible');
                backToTop.classList.remove('opacity-100', 'visible');
            }
        });

        document.getElementById('backToTop').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth Scrolling for Navigation Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
