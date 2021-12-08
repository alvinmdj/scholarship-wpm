@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8 mt-3 mb-5">
    <h3 class="mb-4 fw-bold">Daftar Kriteria</h3>
    @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
    <div class="table-responsive">
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
          @if (count($criterias))
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
                  <a href="/criterias/{{ $criteria->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="5" class="text-center">Belum ada kriteria...</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
    <h5>Total bobot : {{ $totalBobot }}</h5>
  </div>
</div>
@endsection