@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 align-items-center">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Menu</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Menu</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Form Tambah Menu</h3>
        </div>

        <form method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data">

          @csrf
          <div class="card-body">

            <div class="form-group">
              <label>Nama Menu</label>
              <input type="text" name="Nama_Menu" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Gambar</label>
              <input type="file" name="Gambar" class="form-control-file" accept="image/*">
            </div>

            <div class="form-group">
              <label>Jenis</label>
              <select name="Jenis" class="form-control" required>
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
              </select>
            </div>

            <div class="form-group">
              <label>Harga</label>
              <input type="number" name="Harga" class="form-control">
            </div>

            <div class="form-group">
              <label>Status Ketersediaan</label>
              <select name="Status_Ketersediaan" class="form-control" required>
                <option value="Tersedia">Tersedia</option>
                <option value="Tidak Tersedia">Tidak Tersedia</option>
              </select>
            </div>

          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('menu.index') }}" class="btn btn-secondary">Batal</a>
          </div>
        </form>
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->

@include('layouts.footer')
