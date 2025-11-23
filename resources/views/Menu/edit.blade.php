@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 align-items-center">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Menu</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Menu</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Form Edit Menu</h3>
        </div>

        <form method="POST" action="{{ route('menu.update', $menu->ID_Menu) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card-body">

            <div class="form-group">
              <label>Nama Menu</label>
              <input type="text" name="Nama_Menu" class="form-control" value="{{ $menu->Nama_Menu }}" required>
            </div>

            <div class="form-group">
              <label>Gambar (kosongkan jika tidak ingin mengubah)</label>
              <input type="file" name="Gambar" class="form-control-file" accept="image/*">
            </div>

            <div class="form-group">
              <label>Jenis</label>
              <select name="Jenis" class="form-control" required>
                <option value="Makanan" {{ $menu->Jenis == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                <option value="Minuman" {{ $menu->Jenis == 'Minuman' ? 'selected' : '' }}>Minuman</option>
              </select>
            </div>

            <div class="form-group">
              <label>Harga</label>
              <input type="number" name="Harga" class="form-control" value="{{ $menu->Harga }}">
            </div>

            <div class="form-group">
              <label>Status Ketersediaan</label>
              <select name="Status_Ketersediaan" class="form-control" required>
                <option value="Tersedia" {{ $menu->Status_Ketersediaan == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Tidak Tersedia" {{ $menu->Status_Ketersediaan == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
              </select>
            </div>

          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('menu.index') }}" class="btn btn-secondary">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

@include('layouts.footer')
