@extends('layouts.app')

@section('title', 'Dokter')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{ route('dokter') }}">Home</a></li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Akumulasi Data Permohonan</b></h3>

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
                        <!-- ./col -->
                        <div class="col-lg col">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>{{ $permohonan3 }}</h3>
                                    <p>Permohonan Disetujui</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="" class="small-box-footer"></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg col">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $permohonan4 }}</h3>
                                    <p>Penanganan Online</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="" class="small-box-footer"></a>
                            </div>
                        </div>
                        <div class="col-lg col">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>{{ $permohonan5 }}</h3>
                                    <p>Penanganan Offline</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="" class="small-box-footer"></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <!-- ./col -->
                        <div class="col-lg col">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $permohonan7 }}</h3>
                                    <p>Selesai Ditangani</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="" class="small-box-footer"></a>
                            </div>
                        </div>
                        <div class="col-lg col">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $permohonan9 }}</h3>
                                    <p>Hasil Pemeriksaan Langsung</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="" class="small-box-footer"></a>
                            </div>
                        </div>
                        <div class="col-lg col">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $permohonan10 }}</h3>
                                    <p>Batal Ditangani</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="" class="small-box-footer"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
        </div>
    </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title m-0"><b>Grafik Bulanan {{ Carbon\Carbon::now()->year }}</b></h5>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="permohonan7"></div>
                </div>
                <div class="col-md-6">
                    <div id="permohonan9"></div>
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
            var axis7 = @json($axis7);
            var jumlah7 = @json($jumlah7);
            var axis9 = @json($axis9);
            var jumlah9 = @json($jumlah9);

            console.log(axisAll)
            console.log(jumlahAll)

            const chart0 = Highcharts.chart('permohonan7', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Permohonan Selesai Ditangani'
                },
                xAxis: {
                    categories: axis7
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
                    name: 'Permohonan Selesai Ditangani',
                    marker: {
                        symbol: 'square'
                    },
                    data: jumlah7
                }]
            });

            const chart1 = Highcharts.chart('permohonan9', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Hasil Pemeriksaan Langsung'
                },
                xAxis: {
                    categories: axis9
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
                    name: 'Hasil Pemeriksaan',
                    marker: {
                        symbol: 'square'
                    },
                    data: jumlah9
                }]
            });

            const chart2 = Highcharts.chart('permohonan', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Permohonan Layanan Kesehatan'
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
                    name: 'Seluruh Permohonan Layanan Kesehatan',
                    marker: {
                        symbol: 'square'
                    },
                    data: jumlahAll
                }]
            });
        });
    </script>
@endsection 
