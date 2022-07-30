@extends('layouts-public.app')

@section('title', 'SI - KESMA')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="clearfix">
    <div class="container" data-aos="fade-up">

      <div class="hero-img" data-aos="zoom-out" data-aos-delay="200">
        <img src="assets/img/hero-img-6.svg" alt="" class="img-fluid">
        {{-- <img src="assets/img/hero-img-9.svg" alt="" class="img-fluid"> --}}
      </div>

      <div class="hero-info" data-aos="zoom-in" data-aos-delay="100">
        <h2>Sistem Informasi<br>Layanan Konseling<br>& Kesehatan</h2>
        <div>
          <!-- Authentication Links -->
            @guest
              @if (Route::has('login'))
              <a href="/login" class="btn-get-started">Login / Register</a>
              @endif
              @else
              <a href="/mahasiswa" class="btn-get-started">Dashboard Mahasiswa</a>
              </a>
            @endguest 
          <a href="#services" class="btn-services scrollto">Layanan Website</a>
        </div>
      </div>

    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Tentang</h3>
          <p><b>Sistem Informasi Layanan Konseling dan Kesehatan merupakan website yang memberikan informasi seputar kesehatan, akses pelayanan kesehatan fisik dan mental, adanya pencatatan kesehatan dan rekam medis bagi Mahasiswa Politeknik Elektronika Negeri Surabaya.</b></p>
        </header>

        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
            <p>
              Keunggulan dan Fitur Fitur Website Sistem Informasi Layanan Konseling dan Kesehatan Mahasiswa Politeknik Elektronika Negeri Surabaya.
            </p>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bi bi-file-pdf"></i></div>
              <h4 class="title"><a href="">Pengajuan Layanan Kesehatan</a></h4>
              <p class="description">Dapat mengajukan layanan kesehatan fisik dan mental dengan penanganan secara offline dan online.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="bi bi-list-check"></i></div>
              <h4 class="title"><a href="">Tracking Status</a></h4>
              <p class="description">Terdapat fitur untuk melakukan tracking pengajuan dokumen layanan kesehatan fisik dan mental.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="bi bi-calendar4-week"></i></div>
              <h4 class="title"><a href="">Rekam Medis</a></h4>
              <p class="description">Tenaga Kesehatan dapat melakukan pencatatan serta melihat rekam medis mahasiswa Politeknik Elektronika Negeri Surabaya.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bi bi-card-checklist"></i></div>
              <h4 class="title"><a href="">Informasi Kesehatan</a></h4>
              <p class="description">Menampilkan informasi seputar kesehatan untuk menambah pengetahuan mahasiswa Politeknik Elektronika Negeri Surabaya.</p>
            </div>

          </div>

          <div class="col-lg-6 background order-lg-2" data-aos="zoom-in">
            <img src="assets/img/hero-img-10.svg" class="img-fluid" alt="">
            {{-- <img src="assets/img/hero-img-8.svg" class="img-fluid" alt=""> --}}
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Layanan</h3>
          <p><b>Sistem Informasi Kesehatan dan Layanan Konseling memberikan pelayanan kesehatan baik secara fisik dan mental. Website ini memudahkan hubungan antara tenaga kesehatan dan mahasiswa Politeknik Elektronika Negeri Surabaya.</b></p>
        </header>

        <div class="row justify-content-center">

          <div class="col-lg-6" data-aos="fade-right">
            <img src="assets/img/layanan-konseling.svg" height="350px" width="500px" alt="">
          </div>
          <div class="col-lg-6 pt-5 pt-lg-0" data-aos="fade-left">
            <h4><b>Layanan Konseling</b></h4>
            <p style="text-align: justify">
              Mahasiswa dapat melakukan pengajuan layanan kesehatan mental dan ditangani oleh psikolog, memantau status permohonan dengan sistem tracking status, dan mendapatkan penanganan secara cepat dan efisien dengan cara online maupun offline.
            </p>
            <p style="text-align: justify">
              Psikolog dapat mengakses dan menangani permohonan layanan dengan cara online maupun offline dan melakukan pencatatan dan melihat rekam medis kesehatan mahasiswa secara mudah.
            </p>
          </div>

          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
            <img src="assets/img/about-extra-3.svg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-right">
            <br>
            <br>
            <h4><b>Layanan Kesehatan</b></h4>
            <p style="text-align: justify">
              Mahasiswa dapat melakukan pengajuan layanan kesehatan fisik dan ditangani oleh dokter, memantau status permohonan dengan sistem tracking status, dan mendapatkan penanganan secara cepat dan efisien dengan cara online maupun offline.
            </p>
            <p style="text-align: justify">
              Dokter dapat mengakses dan menangani permohonan layanan dengan cara online maupun offline dan melakukan pencatatan dan melihat rekam medis kesehatan mahasiswa secara mudah.
            </p>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row counters" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{$mahasiswa}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Mahasiswa</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{$permohonan}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Permohonan Layanan</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{$informasi}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Informasi Kesehatan</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{$tenagakesehatan}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Tenaga Kesehatan</p>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="clearfix">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3 class="section-title">Informasi Kesehatan</h3>
        </header> 

        <div class="card-body">
          <div class="cointainer">
          <div class="row">
          @foreach ($informasi2 as $item)
          <div class="col-4 d-flex align-items-stretch mb-4">
          <div class="card" style="width: 25rem;">
              <div style="height: 175px; overflow:hidden">
                  <img src="{{ asset('storage' . '/' . $item->gambar)}}" class="card-img-top img-fluid" height="100px" alt="...">
              </div>
              <div class="card-body">
                <h4 class="card-title text-bold">{{ $item->judul }}</h4>
                <p class="card-text">{{ Str::limit($item->deskripsi, 25, '...') }}</p>
                <p class="card-text"><small class="text-muted">{{ $item->sumber }}</small></p>
                <a href="{{route('mahasiswa.informasi-kesehatan.detail', $item->id)}}">Lihat Detail {{ $item->judul }}....</a>
              </div>
          </div>
          </div>
            @endforeach
        </div>
        <div class="pagination justify-content-center">
          {{ $informasi2->links("pagination::bootstrap-4") }}
      </div>
  </div>
        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3>Tenaga Kesehatan</h3>
          <p><b>Profile Tenaga Kesehatan di Politeknik Elektronika Negeri Surabaya.</b></p>
        </div>

        <div class="row">
          @foreach ($tenagakesehatan3 as $item)
          <div class="col-lg-3 col-md-6" data-aos="zoom-out" data-aos-delay="100">
            <div class="member">
              <img src="{{ asset('storage' . '/' . $item->foto_tenaga_kesehatan)}}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>{{ $item->nama_tenaga_kesehatan }}</h4>
                  <span>{{ ucfirst($item->name) }}</span>
                  <span>{{ ucfirst($item->jabatan_tenaga_kesehatan) }}</span>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact">
      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
          <h3>Hubungi Kami</h3>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="map mb-4 mb-lg-0 mx-4">
              <iframe width="600" height="340" src="https://maps.google.com/maps?q=Politeknik%20Elektronika%20Negeri%20Surabaya&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:700px;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:340px;width:600px;}</style>
              {{-- <iframe src="https://maps.google.com/maps?q=politeknik%20elektronika%20negeri%20surabaya&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0; width: 100%; height: 340px;" allowfullscreen></iframe> --}}
            </div>
          </div>
          {{-- <div class="d-flex justify-content-center"> --}}
            <div class="col-lg-6">
              <div class="row">
                <div class="col-lg-6">
            <div class=" card card-contact mx-2">
                <div class="card-body">
                    <div class="icon">
                        <svg width="42" height="44" viewBox="0 0 42 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M38.1818 17.6V4.4C38.1818 1.98 36.4636 0 34.3636 0H3.81818C1.71818 0 0.0190909 1.98 0.0190909 4.4L0 30.8C0 33.22 1.71818 35.2 3.81818 35.2H24.8182V24.2C24.8182 20.548 27.3764 17.6 30.5455 17.6H38.1818ZM20.1027 19.074C19.4918 19.514 18.69 19.514 18.0791 19.074L4.58182 9.35C4.39039 9.22616 4.22275 9.05886 4.08906 8.8582C3.95537 8.65754 3.85839 8.42771 3.80401 8.18262C3.74962 7.93752 3.73896 7.68226 3.77266 7.43228C3.80637 7.18229 3.88373 6.94279 4.00008 6.72826C4.11643 6.51373 4.26935 6.32864 4.44957 6.18419C4.62979 6.03974 4.83357 5.93892 5.04858 5.88786C5.26359 5.83679 5.48536 5.83653 5.70046 5.88709C5.91556 5.93764 6.11952 6.03797 6.3 6.182L19.0909 15.4L31.8818 6.182C32.0623 6.03797 32.2663 5.93764 32.4814 5.88709C32.6965 5.83653 32.9182 5.83679 33.1332 5.88786C33.3482 5.93892 33.552 6.03974 33.7323 6.18419C33.9125 6.32864 34.0654 6.51373 34.1817 6.72826C34.2981 6.94279 34.3755 7.18229 34.4092 7.43228C34.4429 7.68226 34.4322 7.93752 34.3778 8.18262C34.3234 8.42771 34.2265 8.65754 34.0928 8.8582C33.9591 9.05886 33.7914 9.22616 33.6 9.35L20.1027 19.074Z" fill="#325288"/>
                            <path d="M40.0907 26.4C39.0407 26.4 38.1816 27.39 38.1816 28.6V35.2C38.1816 37.62 36.4634 39.6 34.3634 39.6C32.2634 39.6 30.5452 37.62 30.5452 35.2V25.3C30.5452 24.684 30.9652 24.2 31.4998 24.2C32.0343 24.2 32.4543 24.684 32.4543 25.3V33C32.4543 34.21 33.3134 35.2 34.3634 35.2C35.4134 35.2 36.2725 34.21 36.2725 33V25.3C36.2725 23.8414 35.7697 22.4424 34.8746 21.411C33.9795 20.3795 32.7656 19.8 31.4998 19.8C30.234 19.8 29.02 20.3795 28.125 21.411C27.2299 22.4424 26.7271 23.8414 26.7271 25.3V35.2C26.7271 40.062 30.1443 44 34.3634 44C38.5825 44 41.9998 40.062 41.9998 35.2V28.6C41.9998 27.39 41.1407 26.4 40.0907 26.4Z" fill="#325288"/>
                        </svg>
                    </div>
                    <p class="my-4 text-contact">sikesmapens@gmail.com</p>
                </div>
            </div>
                </div>
                <div class="col-lg-6">
            <div class=" card card-contact mx-3">
                <div class="card-body">
                    <div class="icon">
                        <svg width="44" height="45" viewBox="0 0 44 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.0493 3.73559C9.88696 3.52201 9.68205 3.3462 9.44816 3.21984C9.21428 3.09349 8.95679 3.01947 8.69278 3.00271C8.42878 2.98595 8.16431 3.02683 7.91695 3.12264C7.66958 3.21845 7.44498 3.36699 7.25806 3.5584L4.41456 6.46934C3.08631 7.83059 2.59681 9.75715 3.17706 11.4475C5.58534 18.4438 9.50287 24.7959 14.6391 30.0325C19.7594 35.2853 25.9702 39.2919 32.8111 41.755C34.4638 42.3484 36.3476 41.8478 37.6786 40.4893L40.5221 37.5812C40.7092 37.39 40.8545 37.1603 40.9481 36.9073C41.0418 36.6544 41.0818 36.3839 41.0654 36.1139C41.049 35.8439 40.9766 35.5805 40.8531 35.3413C40.7295 35.1021 40.5576 34.8926 40.3488 34.7265L34.0046 29.6809C33.7815 29.5039 33.522 29.3811 33.2457 29.3216C32.9694 29.2622 32.6835 29.2677 32.4096 29.3378L26.3871 30.8762C25.5832 31.0817 24.741 31.0708 23.9424 30.8446C23.1439 30.6183 22.4162 30.1845 21.8303 29.5853L15.0763 22.675C14.4899 22.076 14.0652 21.3319 13.8435 20.5152C13.6218 19.6985 13.6107 18.837 13.8113 18.0146L15.3183 11.8553C15.3868 11.5751 15.3922 11.2827 15.3341 11.0002C15.276 10.7176 15.1558 10.4522 14.9828 10.224L10.0493 3.73559ZM5.18181 1.43777C5.66304 0.945443 6.24118 0.563452 6.87784 0.317164C7.5145 0.0708758 8.1951 -0.0340736 8.87446 0.00928471C9.55381 0.052643 10.2164 0.243317 10.8182 0.568645C11.4199 0.893973 11.9472 1.34651 12.3648 1.89621L17.2983 8.38183C18.2031 9.57152 18.5221 11.1212 18.1646 12.5837L16.6603 18.7431C16.5825 19.0621 16.5867 19.3963 16.6725 19.7131C16.7583 20.03 16.9227 20.3188 17.1498 20.5515L23.9066 27.4618C24.1344 27.6946 24.4172 27.863 24.7276 27.9508C25.0379 28.0385 25.3652 28.0425 25.6776 27.9625L31.6973 26.424C32.403 26.2436 33.1396 26.2296 33.8513 26.383C34.5631 26.5365 35.2314 26.8535 35.8058 27.31L42.1473 32.3556C44.4271 34.1696 44.6361 37.615 42.5956 39.699L39.7521 42.6071C37.7171 44.6884 34.6756 45.6025 31.8403 44.5815C24.5836 41.9702 17.9948 37.7214 12.5628 32.1503C7.11585 26.5956 2.96148 19.8581 0.407807 12.4375C-0.587693 9.54059 0.306057 6.42715 2.34106 4.3459L5.18456 1.43777H5.18181Z" fill="#325288"/>
                            {{-- <path fill-rule="evenodd" clip-rule="evenodd" d="M30.6515 4.62945C30.7792 4.49849 30.931 4.39459 31.098 4.32369C31.2651 4.2528 31.4442 4.21631 31.625 4.21631C31.8059 4.21631 31.985 4.2528 32.152 4.32369C32.3191 4.39459 32.4708 4.49849 32.5985 4.62945L35.75 7.85539L38.9015 4.62945C39.1597 4.36539 39.5099 4.21705 39.875 4.21705C40.2401 4.21705 40.5903 4.36539 40.8485 4.62945C41.1067 4.8935 41.2518 5.25164 41.2518 5.62507C41.2518 5.9985 41.1067 6.35664 40.8485 6.6207L37.6943 9.84382L40.8485 13.0669C41.1067 13.331 41.2518 13.6891 41.2518 14.0626C41.2518 14.436 41.1067 14.7941 40.8485 15.0582C40.5903 15.3223 40.2401 15.4706 39.875 15.4706C39.5099 15.4706 39.1597 15.3223 38.9015 15.0582L35.75 11.8323L32.5985 15.0582C32.4707 15.1889 32.3189 15.2927 32.1519 15.3634C31.9848 15.4342 31.8058 15.4706 31.625 15.4706C31.4442 15.4706 31.2652 15.4342 31.0982 15.3634C30.9311 15.2927 30.7794 15.1889 30.6515 15.0582C30.5237 14.9275 30.4223 14.7722 30.3531 14.6014C30.2839 14.4306 30.2483 14.2475 30.2483 14.0626C30.2483 13.8777 30.2839 13.6946 30.3531 13.5237C30.4223 13.3529 30.5237 13.1977 30.6515 13.0669L33.8058 9.84382L30.6515 6.6207C30.5235 6.49007 30.4219 6.33489 30.3526 6.16404C30.2832 5.9932 30.2476 5.81004 30.2476 5.62507C30.2476 5.4401 30.2832 5.25695 30.3526 5.0861C30.4219 4.91526 30.5235 4.76008 30.6515 4.62945Z" fill="#325288"/> --}}
                        </svg>
                    </div>
                    <p class="my-4 text-contact">+62 31 594 7280</p>
                </div>
            </div>
                </div>
            
            </div>
            <div class="row">
              <div class="my-5 col-lg-12">
                <div class="card card-contact ">
                    <div class="card-body">
                        <div class="icon">
                            <svg width="46" height="47" viewBox="0 0 46 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M35.0134 0C38.0253 0 40.6094 1.05 42.7656 3.15C44.9219 5.25 46 7.76667 46 10.7C46 12.1667 45.093 14.4167 43.279 17.45C41.465 20.4833 39.6853 23.5667 37.9397 26.7C36.1942 29.8333 35.4241 32.3333 35.6295 34.2C35.6295 34.5333 35.4412 34.7 35.0647 34.7C34.6882 34.7 34.5 34.5333 34.5 34.2C34.6369 32.3333 33.8497 29.8333 32.1384 26.7C30.4271 23.5667 28.6644 20.4833 26.8504 17.45C25.0365 14.4167 24.1295 12.1667 24.1295 10.7C24.1295 7.76667 25.1905 5.25 27.3125 3.15C29.4345 1.05 32.0015 0 35.0134 0ZM35.0647 6.4C33.8668 6.4 32.84 6.81667 31.9844 7.65C31.1287 8.48333 30.7009 9.5 30.7009 10.7C30.7009 11.9 31.1287 12.9167 31.9844 13.75C32.84 14.5833 33.8668 15 35.0647 15C36.2626 15 37.2894 14.5833 38.1451 13.75C39.0007 12.9167 39.4286 11.9 39.4286 10.7C39.4286 9.5 39.0007 8.48333 38.1451 7.65C37.2894 6.81667 36.2626 6.4 35.0647 6.4ZM4.41518 4.3H23.4107C22.0417 6.43333 21.3571 8.73333 21.3571 11.2C21.3571 12.9333 22.4524 15.7 24.6429 19.5L0.102679 43.4L0 42.7V8.6C0 7.4 0.427827 6.38333 1.28348 5.55C2.13914 4.71667 3.18304 4.3 4.41518 4.3ZM31.8304 31.8L26.5938 26.7L28.0312 25.2C29.6741 27.8 30.9405 30 31.8304 31.8ZM38.0938 47H5.75L21.8705 31.2L38.0938 47ZM43.8438 22.2V42.7L43.7411 43.4L36.3482 36.2C36.5536 35.6 36.7932 34.9833 37.067 34.35C37.3408 33.7167 37.6488 33.05 37.9911 32.35C38.3333 31.65 38.6585 31.0167 38.9665 30.45C39.2746 29.8833 39.6853 29.1667 40.1987 28.3C40.7121 27.4333 41.0885 26.7833 41.3281 26.35C41.5677 25.9167 41.9955 25.2 42.6116 24.2L43.8438 22.2ZM10.2679 24.6C9.10417 24.6 8.18006 24.3667 7.49554 23.9C6.81101 23.4333 6.46875 22.8 6.46875 22C6.46875 21.0667 7.08482 20.3667 8.31696 19.9C9.00149 19.7 9.75446 19.6 10.5759 19.6H11.0893C11.9792 20.2667 12.5952 20.7667 12.9375 21.1C13.2798 21.4333 13.4509 21.8333 13.4509 22.3C13.4509 22.9 13.1429 23.4333 12.5268 23.9C11.9107 24.3667 11.1577 24.6 10.2679 24.6ZM7.70089 12.4C7.70089 11.7333 7.88914 11.2167 8.26562 10.85C8.64211 10.4833 9.06994 10.3 9.54911 10.3C10.439 10.3 11.1406 10.7 11.654 11.5C12.1674 12.3 12.4241 13.1333 12.4241 14C12.4241 14.7333 12.2016 15.25 11.7567 15.55C11.3118 15.85 10.8497 16 10.3705 16C9.61756 16 8.98438 15.6167 8.47098 14.85C7.95759 14.0833 7.70089 13.2667 7.70089 12.4ZM13.0402 18.6L12.3214 18C11.9107 17.6667 11.7054 17.3667 11.7054 17.1C11.7054 16.6333 11.9449 16.2333 12.4241 15.9C13.5878 15.0333 14.1696 14.0667 14.1696 13C14.1696 12.0667 13.6905 11.2 12.7321 10.4H13.9643L14.8884 9.5H10.4732C9.03571 9.5 7.92336 9.88333 7.13616 10.65C6.34896 11.4167 5.95536 12.3333 5.95536 13.4C5.95536 14.2667 6.26339 15.0333 6.87946 15.7C7.49554 16.3667 8.35119 16.7 9.44643 16.7H9.95982L9.75446 17.5C9.75446 17.9667 9.95982 18.4333 10.3705 18.9C8.72768 18.9667 7.35863 19.3333 6.26339 20C5.16815 20.6 4.62054 21.4333 4.62054 22.5C4.62054 23.3667 5.01414 24.0833 5.80134 24.65C6.58854 25.2167 7.73512 25.5 9.24107 25.5C10.9524 25.5 12.3043 25.1 13.2969 24.3C14.2894 23.5 14.7857 22.6 14.7857 21.6C14.7857 20.5333 14.2039 19.5333 13.0402 18.6Z" fill="#325288"/>
                            </svg>
                            <p class="my-3 text-contact">Jl. Raya ITS – Kampus PENS Sukolilo, Surabaya 60111, INDONESIA</p>
                        </div>
                    </div>
                </div>
            </div>
          </div>

          </div>
        </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@endsection

