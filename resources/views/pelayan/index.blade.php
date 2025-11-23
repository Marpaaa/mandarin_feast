@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 align-items-center">
        <div class="col-sm-6">
          <h1 class="m-0">Data Pelayan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pelayan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <div class="card">
        <div class="card-header">
          <a href="{{ route('pelayan.create') }}" class="btn btn-primary">+ Tambah Pelayan</a>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Shift</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pelayan as $data)
              <tr>
                <td>{{ $data->ID_Pelayan }}</td>
                <td>{{ $data->Nama }}</td>
                <td>{{ $data->Shift }}</td>
                <td>
                  <a href="{{ route('pelayan.edit', $data->ID_Pelayan) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('pelayan.destroy', $data->ID_Pelayan) }}" method="POST" style="display:inline;">
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
    </div>
  </section>
</div>

@include('layouts.footer')
