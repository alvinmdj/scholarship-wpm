@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6 col-lg-4 mt-3">
    <h3 class="mb-4 fw-bold text-center">Tambah Kriteria</h3>
    <form action="/criterias" method="POST" class="row mb-5">
      @csrf
      <div class="card">
        <div class="card-body">
          <div class="mb-3">
            <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
            <input type="text" value="{{ old('nama_kriteria') }}" class="form-control @error('nama_kriteria') is-invalid @enderror" id="nama_kriteria" name="nama_kriteria" placeholder="Nama Kriteria" autofocus>
            @error('nama_kriteria')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="bobot" class="form-label">Bobot Kriteria</label>
            <input type="number" value="{{ old('bobot') }}" class="form-control @error('bobot') is-invalid @enderror" id="bobot" name="bobot" placeholder="Bobot Kriteria">
            <div class="form-text">Jangkauan bobot: 1 - 4</div>
            @error('bobot')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="pendapatan">Jenis Kriteria</label>
              <select class="form-select @error('is_beneficial') is-invalid @enderror" name="is_beneficial">
                <option value="">Pilih Jenis Kriteria</option>
                <option value=1>Benefit</option>
                <option value=0>Non-Benefit</option>
              </select>
              @error('is_beneficial')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-12 text-center">
            <a href="/criterias" class="btn btn2 btn-primary fw-bold" type="submit">Kembali</a>
            <button class="btn btn1 btn-primary fw-bold" type="submit">Simpan</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection