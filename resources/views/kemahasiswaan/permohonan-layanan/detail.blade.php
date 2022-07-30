@extends('layouts.app')

@section('title', 'Kemahasiswaan | Detail Permohonan')

@section('header')
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('kemahasiswaan') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="/kemahasiswaan/permohonan-layanan">Permohonan</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Detail Permohonan</b></h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <table class="table table-alasan">
                        <tr>
                            <th width="200px" style="border: none">Nama Program Studi</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $permohonan->prodi }}</th>
                        </tr>
                        <tr>
                            <th width="200px" style="border: none">Nama Mahasiswa</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $permohonan->nama }}</th>
                        </tr>
                        <tr>
                            <th width="200px" style="border: none">NRP</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $permohonan->nrp }}</th>
                        </tr>
                        <tr>
                            <th width="200px" style="border: none">Judul Keluhan</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $permohonan->judul_keluhan }}</th>
                        </tr>
                        <tr>
                            <th width="200px" style="border: none">Jenis Layanan</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $permohonan->layanan }}</th>
                        </tr>
                        @if ($permohonan->id_layanan == 2)
                        <tr>
                            <th width="200px" style="border: none">Jenis Penanganan</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $permohonan->jenis_penanganan }}</th>
                        </tr>
                        @endif
                        <tr>
                            <th width="200px" style="border: none">Status Permohonan</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ $permohonan->status }}</th>
                        </tr>
                        @if ($permohonan->id_status == 6 && $tolak != null)
                        <tr>
                            <th width="200px" style="border: none">Alasan Penolakan</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ ucfirst($tolak->alasan) }}</th>
                        </tr>
                        @endif
                        @if ($permohonan->id_status != 3 && $online != null)
                        <tr>
                            <th width="200px" style="border: none">Feedback</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ ucfirst($online->feedback)}}</th>
                        </tr>
                        @elseif($permohonan->id_status != 3 && $offline != null)
                        <tr>
                            <th width="200px" style="border: none">Feedback</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ ucfirst($offline->feedback) }}</th>
                        </tr>
                        @endif
                        @if ($permohonan->id_status == 7 || $permohonan->id_status == 9 && $tangani != null)
                        <tr>
                            <th width="200px" style="border: none">Hasil Penanganan</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ ucfirst($tangani->penanganan) }}</th>
                        </tr>
                        @endif
                        @if ($permohonan->id_status == 10 && $batal != null)
                        <tr>
                            <th width="200px" style="border: none">Alasan Pembatalan</th>
                            <th width="30px" style="border: none">:</th>
                            <th style="border: none">{{ ucfirst($batal->alasan) }}</th>
                        </tr>
                        @endif
                    </table>
                    </div>
                <div class="col-6">
                    {{-- <table>
                        @if (substr($permohonan->berkas, -3) == 'pdf')
                            <tr>
                                <th width="150px" style="border: none; padding-bottom: 10px;">File Permohonan</th>
                            </tr>
                            <tr style="display: flex;">
                                <th style="border: none; width: 18vw;">
                                    <a href="{{ route('kemahasiswaan.permohonan-layanan.view', $permohonan->id_permohonan) }}" target="__blank" class="btn btn-block btn-info btn-sm btn-icon">
                                        <span>Lihat File</span>
                                        <i class="far fa-eye"></i>
                                    </a>
                                </th>
                                <th style="border: none; width: 18vw;">
                                    <a href="{{ route('kemahasiswaan.permohonan-layanan.download', $permohonan->id_permohonan) }}" class="btn btn-block btn-info btn-sm btn-icon">
                                        <span>Unduh File</span>
                                        <i class="fas fa-file-download"></i>
                                    </a>
                                </th>
                            </tr>
                        @endif
                        <tr>
                            <th width="200px" style="border: none; padding-top: 30px;">Deskripsi Permohonan</th>
                        </tr>
                    </table> --}}
                    <tr>
                        <th width="200px" style="border: none; padding-top: 30px;"> <b>Deskripsi Permohonan</b></th>
                    </tr>
                    <textarea class="form-control input-disabled" rows="5" cols="0" placeholder="{{ $permohonan->deskripsi_keluhan }}" value="{{ $permohonan->deskripsi_keluhan }}" disabled=""></textarea>
                </div>
            </div>
                <table class="table">
                    <tr>
                        <th style="border: none">
                            <a href="{{ route('kemahasiswaan.permohonan-layanan') }}" class="btn btn-dark">Kembali</a>
                            <a href="{{ route('kemahasiswaan.permohonan-layanan.approve', $permohonan->id_permohonan) }}" class="btn btn-primary {{ $permohonan->id_status == '2' ? '' : 'disabled' }}">Konfirmasi</a>
                            @if ($permohonan->id_status != '6')
                                <button type="button" class="btn btn-danger {{ $permohonan->id_status == '3' ? 'disabled' : '' }}" data-toggle="modal" data-target="{{ $permohonan->id_status == '6' ? '' : '#tolak' . $permohonan->id_permohonan }}">Tolak</button>
                            @endif
                        </th>
                    </tr>
                </table> 
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="container-fluid timeline-container card">
                    <div class="timeline-header card-header">
                        <strong>
                            <h2 class="timeline-title card-title"><b>Tracking Status</b></h2>
                        </strong>
                    </div>
                    <!-- Timelime example  -->
                    <div class="timeline-row row">
                        <div class="col-md-12">
                            <!-- The time line -->
                            <div class="timeline">
                                <br>
                                <div class="time-label">
                                    <span class="bg-warning">{{ Carbon\Carbon::parse($permohonan->created_at)->format('d-F-Y') }}</span>
                                </div>
            
                                <div>
                                    <i class="fa fa-user bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock mr-1"></i>{{ Carbon\Carbon::parse($permohonan->created_at)->format('h:i a') }}</span>
                                        <h3 class="timeline-header no-border"><a class="mr-2">{{ $profile->prodi != null ? $profile->nama . ', ' . $profile->prodi : $profile->nama }}</a>Permohonan Diajukan</h3>
                                    </div>
                                </div>
                                @foreach ($histories as $key => $data)
                                    @if ($key == Carbon\Carbon::parse($permohonan->created_at)->format('d-F-Y'))
                                        @foreach ($data as $item)
                                            <div>
                                                <i class="fa fa-user bg-purple"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fas fa-clock mr-1"></i>{{ Carbon\Carbon::parse($item->updated_at)->format('h:i a') }}</span>
                                                    @if ($item->id_kemahasiswaan == null)
                                                        <h3 class="timeline-header no-border"><a class="mr-2">{{ $item->nama_tenaga_kesehatan . ', ' . $item->jabatan_tenaga_kesehatan }}</a>Permohonan {{ $item->status }}</h3>
                                                        @else                      
                                                        <h3 class="timeline-header no-border"><a class="mr-2">{{ $item->nama . ', ' . $item->jabatan }}</a>Permohonan {{ $item->status }}</h3>
                                                    @endif         
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="time-label">
                                            <span class="bg-green">{{ Carbon\Carbon::parse($data[0]->updated_at)->format('d-F-Y') }}</span>
                                        </div>
                                        @foreach ($data as $item)
                                            <div>
                                                <i class="fa fa-user bg-orange"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="fas fa-clock mr-1"></i>{{ Carbon\Carbon::parse($item->updated_at)->format('h:i a') }}</span>
                                                    @if ($item->id_kemahasiswaan == null)
                                                    <h3 class="timeline-header no-border"><a class="mr-2">{{ $item->nama_tenaga_kesehatan . ', ' . $item->jabatan_tenaga_kesehatan }}</a>Permohonan {{ $item->status }}</h3>
                                                    @else                      
                                                    <h3 class="timeline-header no-border"><a class="mr-2">{{ $item->nama . ', ' . $item->jabatan }}</a>Permohonan {{ $item->status }}</h3>
                                                    @endif         
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                                <div>
                                    <i class="fas fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
        </div>

    <!-- Modal PDF -->
    <div class="modal fade" id="previewPermohonanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" style="height: 92vh;">
                <div class="modal-header modal-view-permohonan">
                    <h5 class="modal-title">{{ $permohonan->judul_keluhan }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!-- Preview PDF Container -->
                <div class="modal-body" id="view-permohonan"></div>
            </div>
        </div>
    </div>
    <!-- /.Modal PDF -->

    {{-- Tolak Modal --}}
    <div class="modal fade" id="tolak{{ $permohonan->id_permohonan }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tolak Permohonan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="formReject">
                    <div class="modal-body">
                        <p>Tolak Permohonan <span style="color: red;"><b>{{ $permohonan->judul_keluhan }}</b></span> dari <span style="color: red;"><b>{{ $permohonan->prodi }}</b></span>?</p>
                        @csrf
                        <input type="hidden" class="permohonan_id" name="permohonan_id" value="{{ $permohonan->id_permohonan }}" id="data{{ $permohonan->id_permohonan }}" />
                        <div class="form-group">
                            <label>Alasan</label>
                            <textarea name="alasan" id="alasan" class="alasan form-control @error('alasan') is-invalid @enderror" rows="3" placeholder="Alasan" value="{{ old('alasan') }}"></textarea>
                            <div class="invalid-feedback">
                                @error('alasan')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-sm btn-default closeReject" data-dismiss="modal">Tutup</button>
                        <button type="submit" id="submitReject" class="btn btn-sm btn-danger">Tolak</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- ./Tolak Modal --}}
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.show-modal-permohonan').on('click', function() {
                var path = '{{ $berkas }}';
                var a = PDFObject.embed(path, "#view-permohonan");
            });
            $('.formReject').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: "/kemahasiswaan/permohonan-layanan/reject",
                    data: {
                        'id_permohonan': $(this).find('input[name=permohonan_id]').val(),
                        'alasan': $(this).find('.alasan').val(),
                        'id_status': 6,
                    },
                    success: function(response) {
                        if (response.success === true) {
                            Swal.fire('Sukses', response.message, "success");
                            $('.swal2-confirm').on('click', function(e) {
                                e.preventDefault();
                                location.reload();
                            });
                        }
                    },
                    error: function(res, err) {
                        if (res.responseJSON.errors.alasan != "undefined") {
                            alert(res.responseJSON.errors.alasan);
                        }
                    },
                });
            });
        });
    </script>
@endsection
