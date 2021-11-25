@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6 mt-3">
    <div class="card">
      <div class="card-body">
        <h3 class="text-center mt-3 mb-5">Daftar Riwayat</h3>
        @if (count($results))
          @foreach ($results as $key => $result)
            @if ($key === 0)
              <div class="card mb-3 history">
                <div class="card-body">
                  <a class="text-style fw-bold" href="/results/{{ $result->slug }}">{{ $result->label }}</a>
                  <span>(Dibuat pada {{ date_format($result->created_at, 'd F Y') }})</span>
                </div>
              </div>
            @else
              @if ($results[$key]->label !== $results[$key-1]->label)
                <div class="card mb-3 history">
                  <div class="card-body">
                    <a class="text-style fw-bold" href="/results/{{ $result->slug }}">{{ $result->label }}</a>
                    <span>(Dibuat pada {{ date_format($result->created_at, 'd F Y') }})</span>
                  </div>
                </div>
              @endif
            @endif
          @endforeach
        @else
          <p class="text-center">Belum ada riwayat...</p>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection