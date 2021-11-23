@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-10 mt-3">
    <div class="row">
      <div class="col-6">
        <h3 class="mb-4 fw-bold">Daftar Mahasiswa</h3>
      </div>
      <div class="col-6">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a href="/students/create" class="btn btn2 btn-primary fw-bold">Tambah</a>
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
          <th scope="col">Foto</th>
          <th scope="col">NIM</th>
          <th scope="col">Nama</th>
          <th scope="col">IPK</th>
          <th scope="col">IPS</th>
          <th scope="col">Pendapatan Orang Tua</th>
          <th scope="col">Jumlah Saudara Kandung</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $student)
          <tr>
            <th scope="row">{{ ($students->currentpage()-1) * $students->perpage() + $loop->index + 1 }}</th>
            <td><img src="{{ asset($student->foto) }}" width="80"></td>
            <td>{{ $student->nim }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->ipk }}</td>
            <td>{{ $student->ips }}</td>
            <td>Rp {{ $student->pendapatan_ortu }},00</td>
            <td>{{ $student->jumlah_saudara }}</td>
            <td>
              <a href="/students/{{ $student->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
              <form action="/students/{{ $student->id }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure to delete this student?')">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="row mt-4 mb-5">
      <div class="col-6">
        {{ $students->links() }}
      </div>
      <div class="col-6">
        <form action="/result" method="POST" class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button type="button" class="btn btn1" data-bs-toggle="modal" data-bs-target="#resultModal">
            Proceeds
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="resultModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="resultModalLabel">Save As</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/calculate" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="label" class="form-label">Nama</label>
            <input type="text" value="{{ old('label') }}" class="form-control @error('label') is-invalid @enderror" id="label" name="label">
            <div class="form-text">Nama akan disimpan sebagai riwayat</div>
            @error('label')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn1">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@error('label')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    var myModal = new bootstrap.Modal(document.getElementById('resultModal'), {
      keyboard: false
    })
    myModal.show()
  </script>
@enderror
@endsection