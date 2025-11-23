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
          <h1 class="m-0">Data Pesanan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pesanan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <div class="card">
        <div class="card-header">
          <a href="{{ route('pesanan.create') }}" class="btn btn-primary">Tambah Pesanan</a>
        </div>

        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Pelanggan</th>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Status Pembayaran</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pesanan as $p)
              <tr>
                <td>{{ $p->ID_Pesanan }}</td>
                <td>{{ $p->pelanggan->Nama ?? '-' }}</td>
                <td>{{ $p->menu->Nama_Menu ?? '-' }}</td>
                <td>{{ $p->Jumlah }}</td>
                <td>Rp {{ number_format($p->Total) }}</td>
                <td>{{ $p->Tanggal }}</td>
                <td>{{ $p->Waktu }}</td>
                <td>
                  <span class="badge {{ $p->Status_Pembayaran === 'Sudah Dibayar' ? 'badge-success' : 'badge-danger' }}">
                    {{ $p->Status_Pembayaran }}
                  </span>
                </td>
                <td>
                  <a href="{{ route('pesanan.edit', $p->ID_Pesanan) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('pesanan.destroy', $p->ID_Pesanan) }}" method="POST" style="display:inline;">
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
