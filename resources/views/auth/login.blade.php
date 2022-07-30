@extends('auth.layouts.app')
@section('title', 'SI-Kesehatan | Login')
@section('isi')
	<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="POST" action="{{ route('register') }}">
            @csrf 
            <div class="form-group row ">
            
                <div class="col-md-6">
                    <input id="nrp" type="text" class="form-control @error('nrp') is-invalid @enderror" name="nrp" value="{{ old('nrp') }}" required autocomplete="nrp" autofocus placeholder="NRP">

                    @error('nrp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <input type="hidden" name="id_role" value="{{ 2 }}" />

            <div class="form-group row ">
            
                <div class="col-md-6">
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus placeholder="Nama Lengkap">
            
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <select class="form-control @error('prodi') is-invalid @enderror" name="prodi" id="prodi" type="text" value="{{ old('prodi') }}" required autocomplete="prodi" autofocus>
                        <option>Pilih Program Studi</option>
                        @foreach (DB::table('prodi')->get() as $item)
                            <option value="{{ $item->prodi }}">{{ $item->prodi }}</option>
                        @endforeach 
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <select class="form-control @error('angkatan') is-invalid @enderror" name="angkatan" id="angkatan" type="text" value="{{ old('angkatan') }}" required autocomplete="angkatan" autofocus>
                        <option>Pilih Angkatan</option>
                        @foreach (DB::table('angkatan')->get() as $item)
                            <option value="{{ $item->angkatan }}">{{ $item->angkatan }}</option>
                        @endforeach 
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <select class="form-control" name="kelas" id="kelas" type="text" value="{{ old('kelas') }}" required autocomplete="kelas" autofocus>
                        <option>Pilih Kelas</option>
                        @foreach (DB::table('kelas')->get() as $item)
                            <option value="{{ $item->kelas }}">{{ $item->kelas }}</option>
                        @endforeach 
                    </select>
                </div>
            </div>

            <div class="form-group row ">
            
                <div class="col-md-6">
                    <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus placeholder="Alamat">
            
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row ">
            
                <div class="col-md-6">
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
            
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row ">
            
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="Password">
            
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>
            </div>
            <br>
                <br>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
	</div>

	<div class="form-container sign-in-container">
		<form method="POST" action="/login">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h5>{{ Session::get('alert-success')}}</h5>
            </div>
            <br>
            <h1>Login User</h1>
            <br>
            <br>
            @csrf
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <!-- /.col -->
                <br>
                <br>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
	</div>

{{-- </body> --}}

	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Login User</h1>
				<p>Silahkan login dengan menggunakan data email dan password</p>
				<button class="ghost" id="signIn">Login</button>
			</div>
			<div class="overlay-panel overlay-right">
                <h1>Registrasi Mahasiswa PENS</h1>
				<p>Bagi user mahasiswa yang belum memiliki akun, silahkan melakukan registrasi</p>
				<button class="ghost" id="signUp">Registrasi</button>
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('css/main.js') }}"></script>
{{-- <footer>
    <div class="">
	<a href="/"><h5>Kembali ke Beranda? Klik Disini!</h5></a>
</div>
</footer> --}}
    
@endsection
