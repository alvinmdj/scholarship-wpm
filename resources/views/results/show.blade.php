@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6 mt-3">
    <h3 class="mb-4 text-center fw-bold">Hasil Penentuan Calon Penerima Beasiswa</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Peringkat</th>
          <th scope="col">NIM</th>
          <th scope="col">Nama</th>
          <th scope="col">Skor</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($results as $result)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $result->nim }}</td>
            <td>{{ $result->nama }}</td>
            <td>{{ $result->skor }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3 mb-5">
      <a href="/students" class="btn btn2 btn-primary fw-bold">Kembali</a>
    </div>
  </div>
</div>
@endsection