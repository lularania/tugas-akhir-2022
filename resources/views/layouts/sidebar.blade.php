<aside class="main-sidebar sidebar-light-primary elevation-4">
    {{-- <!-- Brand Logo --> --}}
    <a class="brand-link text-white">
        <img src="{{ asset('assets/adminlte') }}/dist/img/pens.png" alt="Pens Logo" class="brand-image" style="float: none; margin-left: 1rem; margin-right: 1rem;">
        <b class="brand-text text-dark">SI - KESMA</b>
    </a>

    {{-- <!-- Sidebar --> --}}
    <div class="sidebar">
        {{-- <!-- Sidebar user (optional) --> --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/adminlte') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="img-circle elevation-2" style="opacity: .8">
            </div>
            <div class="info">
                <a href="/profile" class="d-block">{{ ucfirst(Auth::user()->nama) }}</a>
            </div>
        </div> 

        {{-- <!-- Sidebar Menu --> --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    {{-- <!-- View Kemahasiswaan --> --}}
                    @if (Auth::user()->id_role == 1)
                    <li class="nav-item {{ request()->is('kemahasiswaan') ? 'active' : '' }}">
                        <a href="/kemahasiswaan" class="nav-link">
                            <i class="nav-icon fa fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('kemahasiswaan/pedoman') ? 'active' : '' }}">
                        <a href="/kemahasiswaan/pedoman" class="nav-link">
                            <i class="nav-icon fas fa-bookmark"></i>
                            <p>Pedoman Penggunaan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link">
                            <i class="fas fa-user-friends nav-icon"></i>
                            <p>User</p>
                            <i class="fas fa-angle-left right"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item {{ request()->is('kemahasiswaan/tenaga-kesehatan') ? 'active' : '' }}">
                                <a href="/kemahasiswaan/tenaga-kesehatan" class="nav-link">
                                    <i class="fa fa-user-md nav-icon"></i>
                                    <p>Tenaga Kesehatan</p>
                                </a>
                            </li>
                            <li class="nav-item {{ request()->is('kemahasiswaan/user/kemahasiswaan') ? 'active' : '' }}">
                                <a href="/kemahasiswaan/user/kemahasiswaan" class="nav-link">
                                    <i class="fa fa-user nav-icon"></i>
                                    <p>Kemahasiswaan</p>
                                </a>
                            </li>
                            <li class="nav-item {{ request()->is('kemahasiswaan/user/mahasiswa') ? 'active' : '' }}">
                                <a href="/kemahasiswaan/user/mahasiswa" class="nav-link">
                                    <i class="fa fa-hospital-user nav-icon"></i>
                                    <p>Mahasiswa</p>
                                </a>
                            </li>
                            <li class="nav-item {{ request()->is('kemahasiswaan/user/pengurus-ukm-tekkes') ? 'active' : '' }}">
                                <a href="/kemahasiswaan/user/pengurus-ukm-tekkes" class="nav-link">
                                    <i class="fa fa-user-plus nav-icon"></i>
                                    <p>Pengurus UKM Tekkes</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{ request()->is('kemahasiswaan/prodi') ? 'active' : '' }}">
                        <a href="/kemahasiswaan/prodi" class="nav-link">
                            <i class="fas fa-graduation-cap nav-icon"></i>
                            <p>Program Studi</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('kemahasiswaan/jenis-penanganan') ? 'active' : '' }}">
                        <a href="/kemahasiswaan/jenis-penanganan" class="nav-link">
                            <i class="fas fa-clone nav-icon"></i>
                            <p>Jenis Penanganan</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('kemahasiswaan/permohonan-layanan') ? 'active' : '' }}">
                        <a href="/kemahasiswaan/permohonan-layanan" class="nav-link">
                            <i class="fa fa-file-pdf nav-icon"></i>
                            <p>Permohonan Diajukan</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('kemahasiswaan/riwayat/permohonan-layanan') ? 'active' : '' }}">
                        <a href="/kemahasiswaan/riwayat/permohonan-layanan" class="nav-link">
                            <i class="fa fa-archive nav-icon"></i>
                            <p>Riwayat Permohonan</p>
                        </a>
                    </li>

                    @elseif (Auth::user()->id_role == 2)
                    <li class="nav-item {{ request()->is('mahasiswa') ? 'active' : '' }}">
                        <a href="{{ route('mahasiswa') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('mahasiswa/pedoman') ? 'active' : '' }}">
                        <a href="/mahasiswa/pedoman" class="nav-link">
                            <i class="nav-icon fas fa-bookmark"></i>
                            <p>Pedoman Penggunaan</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('mahasiswa/permohonan-layanan') ? 'active' : '' }}">
                        <a href="/mahasiswa/permohonan-layanan" class="nav-link">
                            <i class="fas fa-book-open nav-icon"></i>
                            <p>Permohonan</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('mahasiswa/informasi-kesehatan') ? 'active' : '' }}">
                        <a href="{{ route('mahasiswa.informasi-kesehatan') }}" class="nav-link">
                            <i class="fas fa-align-justify nav-icon"></i>
                            <p>Informasi Kesehatan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Kembali Ke Beranda</p>
                        </a>
                    </li>
                    </li>
                    @elseif (Auth::user()->id_role == 3)
                    <li class="nav-item {{ request()->is('dokter') ? 'active' : '' }}">
                        <a href="{{ route('dokter') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('dokter/pedoman') ? 'active' : '' }}">
                        <a href="/dokter/pedoman" class="nav-link">
                            <i class="nav-icon fas fa-bookmark"></i>
                            <p>Pedoman Penggunaan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link">
                            <i class="fas fa-book-open nav-icon"></i>
                            <p>Permohonan</p>
                            <i class="fas fa-angle-left right"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- @if (PermohonanLayanan::where('id_status' == 3)) --}}
                            <li class="nav-item {{ request()->is('dokter/permohonan-layanan-dikonfirmasi') ? 'active' : '' }}">
                                <a href="{{ route('dokter.permohonan-layanan-dikonfirmasi') }}" class="nav-link">
                                    <i class="fa fa-handshake nav-icon"></i>
                                    <p>Dikonfirmasi</p>
                                </a>
                            </li>
                            {{-- @endif --}}
                            <li class="nav-item {{ request()->is('dokter/permohonan-layanan-ditangani') ? 'active' : '' }}">
                                <a href="{{ route('dokter.permohonan-layanan-ditangani') }}" class="nav-link">
                                    <i class="fa fa-stethoscope nav-icon"></i>
                                    <p>Proses Penanganan</p>
                                </a>
                            </li>
                            <li class="nav-item {{ request()->is('dokter/permohonan-layanan-ditangani-selesai') ? 'active' : '' }}">
                                <a href="{{ route('dokter.permohonan-layanan-ditangani-selesai') }}" class="nav-link">
                                    <i class="fa fa-check-square nav-icon"></i>
                                    <p>Selesai Ditangani</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{ request()->is('dokter/permohonan-layanan-hasil-pemeriksaan-langsung') ? 'active' : '' }}">
                        <a href="{{ route('dokter.permohonan-layanan-hasil-pemeriksaan-langsung') }}" class="nav-link">
                            <i class="fas fa-align-justify nav-icon"></i>
                            <p>Hasil Pemeriksaan</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('dokter/permohonan-layanan/rekam-medis') ? 'active' : '' }}">
                        <a href="{{ route('dokter.permohonan-layanan.rekam-medis') }}" class="nav-link">
                            <i class="fas fa-heartbeat nav-icon"></i>
                            <p>Riwayat Rekam Medis</p>
                        </a>
                    </li>
                    @elseif (Auth::user()->id_role == 4)
                    <li class="nav-item {{ request()->is('psikolog') ? 'active' : '' }}">
                        <a href="{{ route('psikolog') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('psikolog/pedoman') ? 'active' : '' }}">
                        <a href="/psikolog/pedoman" class="nav-link">
                            <i class="nav-icon fas fa-bookmark"></i>
                            <p>Pedoman Penggunaan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link">
                            <i class="fas fa-book-open nav-icon"></i>
                            <p>Permohonan</p>
                            <i class="fas fa-angle-left right"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item {{ request()->is('psikolog/permohonan-layanan-dikonfirmasi') ? 'active' : '' }}">
                                <a href="{{ route('psikolog.permohonan-layanan-dikonfirmasi') }}" class="nav-link">
                                    <i class="fa fa-handshake nav-icon"></i>
                                    <p>Dikonfirmasi</p>
                                </a>
                            </li>
                            <li class="nav-item {{ request()->is('psikolog/permohonan-layanan-ditangani') ? 'active' : '' }}">
                                <a href="{{ route('psikolog.permohonan-layanan-ditangani') }}" class="nav-link">
                                    <i class="fa fa-stethoscope nav-icon"></i>
                                    <p>Proses Penanganan</p>
                                </a>
                            </li>
                            <li class="nav-item {{ request()->is('psikolog/permohonan-layanan-ditangani-selesai') ? 'active' : '' }}">
                                <a href="{{ route('psikolog.permohonan-layanan-ditangani-selesai') }}" class="nav-link">
                                    <i class="fa fa-check-square nav-icon"></i>
                                    <p>Selesai Ditangani</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{ request()->is('psikolog/permohonan-layanan-hasil-pemeriksaan-langsung') ? 'active' : '' }}">
                        <a href="{{ route('psikolog.permohonan-layanan-hasil-pemeriksaan-langsung') }}" class="nav-link">
                            <i class="fas fa-align-justify nav-icon"></i>
                            <p>Hasil Pemeriksaan</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('psikolog/permohonan-layanan/rekam-medis') ? 'active' : '' }}">
                        <a href="{{ route('psikolog.permohonan-layanan.rekam-medis') }}" class="nav-link">
                            <i class="fas fa-heartbeat nav-icon"></i>
                            <p>Riwayat Rekam Medis</p>
                        </a>
                    </li>
                    @elseif (Auth::user()->id_role == 5)
                    <li class="nav-item {{ request()->is('pengurus-tekkes') ? 'active' : '' }}">
                        <a href="{{ route('pengurus-tekkes') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('pengurus-tekkes/pedoman') ? 'active' : '' }}">
                        <a href="/pengurus-tekkes/pedoman" class="nav-link">
                            <i class="nav-icon fas fa-bookmark"></i>
                            <p>Pedoman Penggunaan</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('pengurus-tekkes/kelola-informasi') ? 'active' : '' }}">
                        <a href="{{ route('pengurus-tekkes.kelola-informasi') }}" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>Kelola Informasi</p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('pengurus-tekkes/informasi-kesehatan') ? 'active' : '' }}">
                        <a href="{{ route('pengurus-tekkes.informasi-kesehatan') }}" class="nav-link">
                            <i class="fas fa-align-justify nav-icon"></i>
                            <p>Informasi Kesehatan</p>
                        </a>
                    </li>
                    </li>
                    @else
                    return null;
                @endif

                <li class="nav-item {{ request()->is('profile') ? 'active' : '' }}">
                    <a href="{{ route('profile') }}" class="nav-link">
                        <i class="fas fa-user nav-icon"></i>
                        <p>Profile</p>
                    </a>
                </li>
            </ul>
        </nav>
        {{-- <!-- /.sidebar-menu --> --}}
    </div>
    {{-- <!-- /.sidebar --> --}}
</aside>
