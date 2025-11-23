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
          <h1 class="m-0">Menu</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Menu</li>
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
          <a href="{{ route('menu.create') }}" class="btn btn-primary">Tambah Menu</a>
        </div>

        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Menu</th>
                <th>Gambar</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Status Ketersediaan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($menu as $m)
              <tr>
                <td>{{ $m->ID_Menu }}</td>
                <td>{{ $m->Nama_Menu }}</td>
                <td>
                  @if($m->Gambar)
                    <img src="{{ route('menu.gambar', $m->ID_Menu) }}" width="80">
                  @else
                    Tidak ada gambar
                  @endif
                </td>
                <td>{{ $m->Jenis }}</td>
                <td>Rp{{ number_format($m->Harga, 0, ',', '.') }}</td>
                <td>{{ $m->Status_Ketersediaan }}</td>
                <td>
                  <a href="{{ route('menu.edit', $m->ID_Menu) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('menu.destroy', $m->ID_Menu) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus menu ini?')" class="btn btn-danger btn-sm">Hapus</button>
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
