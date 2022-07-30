@extends('layouts.app')

@section('title', 'Mahasiswa')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="/mahasiswa">Home</a></li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="col-md-20">
            <div class="card-body">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/1.png') }}" class="d-block w-100" height="250px" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/2.png') }}" class="d-block w-100" height="250px" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/3.png') }}" class="d-block w-100" height="250px" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> <b>Akumulasi Data Permohonan</b></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg col">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $permohonan1 }}</h3>
                                    <p>Draft</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="" class="small-box-footer"></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg col">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $permohonan2 }}</h3>
                                    <p>Diajukan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="" class="small-box-footer"></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg col">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>{{ $permohonan3 }}</h3>
                                    <p>Dikonfirmasi</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="" class="small-box-footer"></a>
                            </div>
                        </div>
                        <div class="col-lg col">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $permohonan4 }}</h3>
                                    <p>Penanganan Online</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="" class="small-box-footer"></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg col">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>{{ $permohonan5 }}</h3>
                                    <p>Penanganan Offline</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="" class="small-box-footer"></a>
                            </div>
                        </div>
                        <div class="col-lg col">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $permohonan6 }}</h3>
                                    <p>Ditolak</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="" class="small-box-footer"></a>
                            </div>
                        </div>
                        <div class="col-lg col">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $permohonan7 }}</h3>
                                    <p>Selesai Ditangani</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="" class="small-box-footer"></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg col">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $permohonan9 }}</h3>
                                    <p>Hasil Pemeriksaan Langsung</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="" class="small-box-footer"></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.row -->
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title m-0"><b>Informasi Penting</b></h5>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col">
                <div class="card-body" style="padding: 1rem 1.25rem 0rem 1.25rem;">
                    <h6 class="card-title"><b>Berkas Pengajuan Permohonan Layanan</b></h6> <br>
                </div>
            </div>
        </div> --}}
        
        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    <img src="{{ asset('assets/img/6.png') }}" alt="sejuta-domain-gratis-kominfo.jpeg" width="525px" style="-webkit-fill-available;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <br>
                    <br>
                    <p class="card-text" style="text-align: justify">Pengajuan permohonan layanan kesehatan dan konseling harap dilengkapi dengan berkas yang berisi detail keluhan, silahkan menceritakan terkait gejala apa yang anda rasakan dan alami. Dan berapa lama anda merasakan keluhan tersebut. Apabila terdapat foto keluhan dan pernah melakukan pemeriksaan sebelumnya dapat disertakan didalam dokumen PDF. Data ini nantinya akan membantu tenaga kesehatan untuk mengetahui detail dari kondisi anda dan memberikan penanganan yang tepat.</p>
                    <div class="float-left">
                        <a href="{{ route('mahasiswa.permohonan-layanan.add') }}" class="btn btn-danger"><i class="fas fa-book-open"></i> Ajukan Permohonan</a>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('mahasiswa.download-berkas') }}" class="btn btn-primary"><i class="fas fa-file-download"></i> Contoh Berkas Pengajuan</a>
    
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="card">
        <div class="card-header">
            <h5 class="card-title m-0"><b>Grafik Bulanan {{ Carbon\Carbon::now()->year }}</b></h5>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div id="permohonan1"></div>
            </div>
            <div class="col-md-6">
                <div id="permohonan2"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="permohonan"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var axisAll = @json($axisAllPermohonan);
            var jumlahAll = @json($jumlahAllPermohonan);
            var axis1 = @json($axis1);
            var jumlah1 = @json($jumlah1);
            var axis2 = @json($axis2);
            var jumlah2 = @json($jumlah2);

            const chart0 = Highcharts.chart('permohonan1', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Pengajuan Layanan Kesehatan'
                },
                xAxis: {
                    categories: axis1
                },
                yAxis: {
                    title: {
                        text: 'Jumlah Permohonan'
                    },
                },
                tooltip: {
                    crosshairs: true,
                    shared: true
                },
                plotOptions: {
                    spline: {
                        marker: {
                            radius: 4,
                            lineColor: '#666666',
                            lineWidth: 1
                        }
                    }
                },
                series: [{
                    name: 'Permohonan',
                    marker: {
                        symbol: 'square'
                    },
                    data: jumlah1
                }]
            });

            const chart1 = Highcharts.chart('permohonan2', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Pengajuan Layanan Konseling'
                },
                xAxis: {
                    categories: axis2
                },
                yAxis: {
                    title: {
                        text: 'Jumlah Permohonan'
                    },
                },
                tooltip: {
                    crosshairs: true,
                    shared: true
                },
                plotOptions: {
                    spline: {
                        marker: {
                            radius: 4,
                            lineColor: '#666666',
                            lineWidth: 1
                        }
                    }
                },
                series: [{
                    name: 'Permohonan',
                    marker: {
                        symbol: 'square'
                    },
                    data: jumlah2
                }]
            });

            const chart2 = Highcharts.chart('permohonan', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Pengajuan Seluruh Permohonan'
                },
                xAxis: {
                    categories: axisAll
                },
                yAxis: {
                    title: {
                        text: 'Jumlah Permohonan'
                    },
                },
                tooltip: {
                    crosshairs: true,
                    shared: true
                },
                plotOptions: {
                    spline: {
                        marker: {
                            radius: 4,
                            lineColor: '#666666',
                            lineWidth: 1
                        }
                    }
                },
                series: [{
                    name: 'Permohonan',
                    marker: {
                        symbol: 'square'
                    },
                    data: jumlahAll
                }]
            });
        });
    </script> --}}
@endsection
