@extends('layouts.app')

@section('title', 'Kemahasiswaan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="">Home</a></li>
        </ol>
    </div>
    @endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> <b>Akumulasi Data</b></h3>
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
                                    <h3>{{ $user }}</h3>
                                    <p>User</p>
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
                                    <h3>{{ $kemahasiswaan }}</h3>
                                    <p>Kemahasiswaan</p>
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
                                    <h3>{{ $mahasiswa }}</h3>
                                    <p>Mahasiswa</p>
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
                                    <h3>{{ $dokter }}</h3>
                                    <p>Dokter</p>
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
                                    <h3>{{ $psikolog }}</h3>
                                    <p>Psikolog</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="" class="small-box-footer"></a>
                            </div>
                        </div>
                        <div class="col-lg col">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>{{ $tekkes }}</h3>
                                    <p>Pengurus Tekkes</p>
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
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $permohonan2 }}</h3>
                                    <p>Permohonan Diajukan</p>
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
                                    <h3>{{ $permohonan3 }}</h3>
                                    <p>Permohonan Dikonfirmasi</p>
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
                <!-- /.row -->
                </div>
            </div>
        </div>

    <div class="card">
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
    </script>
@endsection