@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12 mt-3">
    <h3 class="mb-4 fw-bold text-center">Tambah Mahasiswa</h3>
    <form action="/students" method="POST" class="row mb-5">
      @csrf
      <div class="col-sm-7 mt-3">
        <div class="card">
          <div class="card-body">
            <h3 class="text-center mb-4">Data Diri</h3>
            <div class="row mb-3">
              <label for="formFile" class="col-sm-4 col-form-label">Foto Kandidat</label>
              <div class="col-sm-8">
                <input class="form-control" type="file" id="formFile" name="foto">
                @error('foto')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label for="name" class="col-sm-4 col-form-label">Nama Mahasiswa</label>
              <div class="col-sm-8">
                <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Mahasiswa">
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label for="nim" class="col-sm-4 col-form-label">Nomor Induk Mahasiswa</label>
              <div class="col-sm-8">
                <input type="text" value="{{ old('nim') }}" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" placeholder="Nomor Induk Mahasiswa">
                @error('nim')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
              <div class="col-sm-8">
                <input type="text" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat">
                @error('alamat')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-5 mt-3">
        <div class="card">
          <div class="card-body">
            <h3 class="text-center mb-4">Informasi</h3>
            <div class="mb-3">
              <label for="ipk" class="form-label">IPK</label>
              <input type="number" value="{{ old('ipk') }}" class="form-control @error('ipk') is-invalid @enderror" id="ipk" name="ipk" min="0" max="4" placeholder="contoh: 3.15">
              @error('ipk')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="ips" class="form-label">IPS</label>
              <input type="number" value="{{ old('ips') }}" class="form-control @error('ips') is-invalid @enderror" id="ips" name="ips" min="0" max="4" placeholder="contoh: 3.96">
              @error('ips')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="pendapatan_ortu">Pendapatan Orang Tua</label>
              <div class="input-group">
                <div class="input-group-text">Rp</div>
                <input type="number" value="{{ old('pendapatan_ortu') }}" class="form-control @error('pendapatan_ortu') is-invalid @enderror" id="pendapatan_ortu" name="pendapatan_ortu" placeholder="contoh: 1000000">
                @error('pendapatan_ortu')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="jumlah_saudara">Jumlah Saudara Kandung yang Dibiayai</label>
              <div class="input-group">
                <input type="number" value="{{ old('jumlah_saudara') }}" class="form-control @error('jumlah_saudara') is-invalid @enderror" id="jumlah_saudara" name="jumlah_saudara" min="0" placeholder="contoh: 2">
                <div class="input-group-text">orang</div>
                @error('jumlah_saudara')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="biaya_hidup">Biaya Hidup per Bulan</label>
              <div class="input-group">
                <div class="input-group-text">Rp</div>
                <input type="number" value="{{ old('biaya_hidup') }}" class="form-control @error('biaya_hidup') is-invalid @enderror" id="biaya_hidup" name="biaya_hidup" placeholder="contoh: 500000">
                <div class="input-group-text">/ bulan</div>
                @error('biaya_hidup')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-md-12 text-center">
              <a href="/students" class="btn btn2 btn-primary fw-bold" type="submit">Kembali</a>
              <button class="btn btn1 btn-primary fw-bold" type="submit">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection