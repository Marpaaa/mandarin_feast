@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 align-items-center">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Pesanan</h1>
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

  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Form Tambah Pesanan</h3>
        </div>

        <div class="card-body">
          <form action="{{ route('pesanan.store') }}" method="POST">
            @csrf

            <div class="form-group">
              <label for="ID_Pelanggan">Pelanggan</label>
              <select name="ID_Pelanggan" class="form-control" required>
                <option value="">-- Pilih Pelanggan --</option>
                @foreach($pelanggan as $p)
                <option value="{{ $p->ID_Pelanggan }}">{{ $p->Nama }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="ID_Menu">Menu</label>
              <select name="ID_Menu" class="form-control" required>
                <option value="">-- Pilih Menu --</option>
                @foreach($menu as $m)
                <option value="{{ $m->ID_Menu }}">{{ $m->Nama_Menu }} - Rp {{ number_format($m->Harga) }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="Jumlah">Jumlah</label>
              <input type="number" name="Jumlah" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="Catatan">Catatan</label>
              <textarea name="Catatan" class="form-control"></textarea>
            </div>

            <div class="form-group">
              <label for="Tanggal">Tanggal</label>
              <input type="date" name="Tanggal" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="Waktu">Waktu</label>
              <input type="time" name="Waktu" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Batal</a>
          </form>
        </div>
      </div>

    </div>
  </section>
</div>

@include('layouts.footer')
