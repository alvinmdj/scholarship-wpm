@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6 col-lg-4 mt-5">
    <main class="form-signin">
      <div class="card">
        <div class="card-body">
          <h3 class="text-center mb-4">Login Page</h3>
          @if(session()->has('authError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('authError') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          <form action="/" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" value="{{ old('email') }}" class="form-control" id="email" name="email" placeholder="Email address" autofocus required>
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="col-md-12 text-center">
              <button class="btn btn1 btn-primary fw-bold" type="submit">Login</button>
            </div>
          </form>
        </div>
      </div>
    </main>
  </div>
</div>
@endsection