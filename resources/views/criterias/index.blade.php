@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8 mt-3 mb-5">
    <div class="row">
      <div class="col-6">
        <h3 class="mb-4 fw-bold">Daftar Kriteria</h3>
      </div>
      <div class="col-6">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a href="/criterias/create" class="btn btn2 btn-primary fw-bold">Tambah Kriteria</a>
        </div>
      </div>
    </div>
    @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Kriteria</th>
          <th scope="col">Bobot</th>
          <th scope="col">Jenis</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @php
            $totalBobot = 0
        @endphp
        @foreach ($criterias as $criteria)
          @php
            $totalBobot += $criteria->bobot
          @endphp
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $criteria->nama_kriteria }}</td>
            <td>{{ $criteria->bobot }}</td>
            <td>
              @if ($criteria->is_beneficial)
                Benefit
              @else
                Non-Benefit
              @endif</td>
            <td>
              <a href="/criterias/{{ $criteria->id }}" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
              <form action="/criterias/{{ $criteria->id }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure to delete this criteria?')">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <h5>Total bobot : {{ $totalBobot }}</h5>
  </div>
</div>
@endsection