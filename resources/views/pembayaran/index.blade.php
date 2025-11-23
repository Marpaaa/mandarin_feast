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
          <h1 class="m-0">Data Pembayaran</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pembayaran</li>
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
          <a href="{{ route('pembayaran.create') }}" class="btn btn-primary">+ Tambah Pembayaran</a>
        </div>

        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID Pembayaran</th>
                <th>ID Pesanan</th>
                <th>Metode Pembayaran</th>
                <th>Total Bayar</th>
                <th>Waktu Bayar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($pembayaran as $data)
              <tr>
                <td>{{ $data->ID_Pembayaran }}</td>
                <td>{{ $data->ID_Pesanan }}</td>
                <td>{{ $data->Metode_Pembayaran }}</td>
                <td>Rp {{ number_format($data->Total_Bayar) }}</td>
                <td>{{ $data->Waktu_Bayar }}</td>
                <td>
  <!-- Tombol Cetak -->
  <a href="{{ route('pembayaran.cetak', $data->ID_Pembayaran) }}" target="_blank" class="btn btn-info btn-sm">Cetak</a>

  <!-- Tombol Edit & Delete -->
  <a href="{{ route('pembayaran.edit', $data->ID_Pembayaran) }}" class="btn btn-warning btn-sm">Edit</a>
  <form action="{{ route('pembayaran.destroy', $data->ID_Pembayaran) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
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
