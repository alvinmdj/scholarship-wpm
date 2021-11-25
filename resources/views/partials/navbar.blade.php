<nav id="navbar-frame" class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    @auth
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item pe-3">
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" id="btnLogout" class="nav-link active">
                Log Out
              </button>
            </form>
          </li>
          <li class="nav-item pe-3">
            <a class="nav-link active" aria-current="page" href="/students">Daftar Mahasiswa</a>
          </li>
          <li class="nav-item pe-3">
            <a class="nav-link active" aria-current="page" href="/criterias">Daftar Kriteria</a>
          </li>
          <li class="nav-item pe-3">
            <a class="nav-link active" aria-current="page" href="/results">Daftar Riwayat</a>
          </li>
        </ul>
        <div class="d-flex">
          <span class="text-white">Halo, {{ auth()->user()->name }}</span>
        </div>
      </div>
    @else
      <div class="collapse navbar-collapse justify-content-md-center" id="navbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active fw-bold" aria-current="page" href="/">Sistem Pakar Penentuan Calon Penerima Beasiswa Bantuan Biaya</a>
          </li>
        </ul>
      </div>
    @endauth
  </div>
</nav>