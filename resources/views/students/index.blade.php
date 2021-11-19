@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12 mt-3">
    <div class="row">
      <div class="col-6">
        <h3 class="mb-4 fw-bold">Daftar Mahasiswa</h3>
      </div>
      <div class="col-6">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button class="btn btn2 btn-primary fw-bold">Tambah</button>
        </div>
      </div>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">NIM</th>
          <th scope="col">Nama</th>
          <th scope="col">IPK</th>
          <th scope="col">IPS</th>
          <th scope="col">Pendapatan Orang Tua</th>
          <th scope="col">Jumlah Saudara Kandung</th>
          <th scope="col">Biaya Hidup (per bulan)</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>00000035733</td>
          <td>Alvin Martin Djong</td>
          <td>4.00</td>
          <td>4.00</td>
          <td>Rp 1.000.000,00</td>
          <td>10</td>
          <td>Rp 500.000,00</td>
          <td>
            <a href="" class="badge bg-info"><i class="bi bi-eye"></i></a>
            <a href="" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
            <a href="" class="badge bg-danger"><i class="bi bi-trash"></i></a>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>00000035733</td>
          <td>Alvin Martin Djong</td>
          <td>4.00</td>
          <td>4.00</td>
          <td>Rp 1.000.000,00</td>
          <td>10</td>
          <td>Rp 500.000,00</td>
          <td>
            <a href="" class="badge bg-info"><i class="bi bi-eye"></i></a>
            <a href="" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
            <a href="" class="badge bg-danger"><i class="bi bi-trash"></i></a>
          </td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>00000035733</td>
          <td>Alvin Martin Djong</td>
          <td>4.00</td>
          <td>4.00</td>
          <td>Rp 1.000.000,00</td>
          <td>10</td>
          <td>Rp 500.000,00</td>
          <td>
            <a href="" class="badge bg-info"><i class="bi bi-eye"></i></a>
            <a href="" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
            <a href="" class="badge bg-danger"><i class="bi bi-trash"></i></a>
          </td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>00000035733</td>
          <td>Alvin Martin Djong</td>
          <td>4.00</td>
          <td>4.00</td>
          <td>Rp 1.000.000,00</td>
          <td>10</td>
          <td>Rp 500.000,00</td>
          <td>
            <a href="" class="badge bg-info"><i class="bi bi-eye"></i></a>
            <a href="" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
            <a href="" class="badge bg-danger"><i class="bi bi-trash"></i></a>
          </td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td>00000035733</td>
          <td>Alvin Martin Djong</td>
          <td>4.00</td>
          <td>4.00</td>
          <td>Rp 1.000.000,00</td>
          <td>10</td>
          <td>Rp 500.000,00</td>
          <td>
            <a href="" class="badge bg-info"><i class="bi bi-eye"></i></a>
            <a href="" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
            <a href="" class="badge bg-danger"><i class="bi bi-trash"></i></a>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end my-5">
      <button class="btn btn2 btn-primary fw-bold">Proceeds</button>
    </div>
  </div>
</div>
@endsection