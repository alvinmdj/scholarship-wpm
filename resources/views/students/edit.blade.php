@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12 mt-3">
    <h3 class="mb-4 fw-bold text-center">Tambah Mahasiswa</h3>
    <form action="" method="POST" class="row mb-5">
      @csrf
      <div class="col-sm-7 mt-3">
        <main class="form-signin">
          <div class="card">
            <div class="card-body">
              <h3 class="text-center mb-4">Data Diri</h3>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="formFile" class="form-label">Foto Kandidat</label>
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="formFile" class="form-label">Logo Universitas</label>
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="name" class="col-sm-4 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nama Mahasiswa" autofocus required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="nim" class="col-sm-4 col-form-label">Nomor Induk Mahasiswa</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="nim" name="nim" placeholder="Nomor Induk Mahasiswa" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="address" class="col-sm-4 col-form-label">Alamat</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="address" name="address" placeholder="Alamat" required>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
      <div class="col-sm-5 mt-3">
        <main class="form-signin">
          <div class="card">
            <div class="card-body">
              <h3 class="text-center mb-4">Informasi</h3>
              <div class="mb-3">
                <label for="ipk" class="form-label">IPK</label>
                <input type="number" class="form-control" id="ipk" name="ipk" min="0" max="4" placeholder="contoh: 3.15" required>
              </div>
              <div class="mb-3">
                <label for="ips" class="form-label">Peningkatan Prestasi Akademik</label>
                <input type="number" class="form-control" id="ips" name="ips" min="0" max="4" placeholder="contoh: 3.96" required>
              </div>
              <div class="mb-3">
                <label class="form-label" for="pendapatan">Pendapatan Orang Tua</label>
                <div class="input-group">
                  <div class="input-group-text">Rp</div>
                  <input type="number" class="form-control" id="pendapatan" name="pendapatan" placeholder="contoh: 1000000" required>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="saudara">Jumlah Saudara Kandung yang Dibiayai</label>
                <div class="input-group">
                  <input type="number" class="form-control" id="saudara" name="saudara" min="0" placeholder="contoh: 2" required>
                  <div class="input-group-text">orang</div>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="biaya_hidup">Biaya Hidup per Bulan</label>
                <div class="input-group">
                  <div class="input-group-text">Rp</div>
                  <input type="number" class="form-control" id="biaya_hidup" name="biaya_hidup" placeholder="contoh: 500000" required>
                  <div class="input-group-text">/ bulan</div>
                </div>
              </div>
              <div class="col-md-12 text-center">
                <button class="btn btn1 btn-primary fw-bold" type="submit">Simpan</button>
              </div>
            </div>
          </div>
        </main>
      </div>
    </form>
  </div>
</div>
@endsection