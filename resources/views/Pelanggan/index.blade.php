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
          <h1 class="m-0">Input Pelanggan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pelanggan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
          <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">Tambah Pelanggan</a>
        </div>

        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Nomor Telepon</th>
                <th>Tipe Kunjungan</th>
                <th>No Meja</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pelanggan as $p)
              <tr>
                <td>{{ $p->ID_Pelanggan }}</td>
                <td>{{ $p->Nama }}</td>
                <td>{{ $p->Nomor_Telepon }}</td>
                <td>{{ $p->Tipe_Kunjungan }}</td>
                <td>{{ $p->No_Meja }}</td>
                <td>
                  <a href="{{ route('pelanggan.edit', $p->ID_Pelanggan) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('pelanggan.destroy', $p->ID_Pelanggan) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->

@include('layouts.footer')
