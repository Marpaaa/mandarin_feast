@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 align-items-center">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Pesanan</h1>
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
          <h3 class="card-title">Form Edit Pesanan</h3>
        </div>

        <div class="card-body">
          <form action="{{ route('pesanan.update', $pesanan->ID_Pesanan) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label for="ID_Pelanggan">Pelanggan</label>
              <select name="ID_Pelanggan" class="form-control" required>
                @foreach($pelanggan as $p)
                <option value="{{ $p->ID_Pelanggan }}" {{ $pesanan->ID_Pelanggan == $p->ID_Pelanggan ? 'selected' : '' }}>
                  {{ $p->Nama }}
                </option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="ID_Menu">Menu</label>
              <select name="ID_Menu" class="form-control" required>
                @foreach($menu as $m)
                <option value="{{ $m->ID_Menu }}" {{ $pesanan->ID_Menu == $m->ID_Menu ? 'selected' : '' }}>
                  {{ $m->Nama_Menu }} - Rp {{ number_format($m->Harga) }}
                </option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="Jumlah">Jumlah</label>
              <input type="number" name="Jumlah" class="form-control" value="{{ $pesanan->Jumlah }}" required>
            </div>

            <div class="form-group">
              <label for="Catatan">Catatan</label>
              <textarea name="Catatan" class="form-control">{{ $pesanan->Catatan }}</textarea>
            </div>

            <div class="form-group">
              <label for="Tanggal">Tanggal</label>
              <input type="date" name="Tanggal" class="form-control" value="{{ $pesanan->Tanggal }}" required>
            </div>

            <div class="form-group">
              <label for="Waktu">Waktu</label>
              <input type="time" name="Waktu" class="form-control" value="{{ $pesanan->Waktu }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Batal</a>
          </form>
        </div>
      </div>

    </div>
  </section>
</div>

@include('layouts.footer')
