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
          <h1 class="m-0">Tambah Pelanggan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Pelanggan</li>
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
          <h3 class="card-title">Form Tambah Pelanggan</h3>
        </div>

        <form method="POST" action="{{ route('pelanggan.store') }}">
          @csrf
          <div class="card-body">

            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="Nama" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Nomor Telepon</label>
              <input type="text" name="Nomor_Telepon" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Tipe Kunjungan</label>
              <select name="Tipe_Kunjungan" class="form-control" required>
                <option value="Dine-in">Dine-in</option>
                <option value="Take Away">Take Away</option>
              </select>
            </div>

            <div class="form-group">
              <label>No Meja</label>
              <input type="number" name="No_Meja" class="form-control">
            </div>

          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Batal</a>
          </div>
        </form>
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->

@include('layouts.footer')
