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
          <h1 class="m-0">Edit Pelanggan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Pelanggan</li>
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
          <h3 class="card-title">Form Edit Pelanggan</h3>
        </div>

        <form method="POST" action="{{ route('pelanggan.update', $pelanggan->ID_Pelanggan) }}">
          @csrf
          @method('PUT')

          <div class="card-body">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="Nama" class="form-control" value="{{ $pelanggan->Nama }}">
            </div>

            <div class="form-group">
              <label>Nomor Telepon</label>
              <input type="text" name="Nomor_Telepon" class="form-control" value="{{ $pelanggan->Nomor_Telepon }}">
            </div>

            <div class="form-group">
              <label>Tipe Kunjungan</label>
              <select name="Tipe_Kunjungan" class="form-control">
                <option value="Dine-in" {{ $pelanggan->Tipe_Kunjungan == 'Dine-in' ? 'selected' : '' }}>Dine-in</option>
                <option value="Take Away" {{ $pelanggan->Tipe_Kunjungan == 'Take Away' ? 'selected' : '' }}>Take Away</option>
              </select>
            </div>

            <div class="form-group">
              <label>No Meja</label>
              <input type="number" name="No_Meja" class="form-control" value="{{ $pelanggan->No_Meja }}">
            </div>
          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
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
