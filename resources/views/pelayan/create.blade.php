@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="m-0">Tambah Pelayan</h1>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <form action="{{ route('pelayan.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="Nama" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Shift</label>
          <select name="Shift" class="form-control" required>
            <option value="">-- Pilih Shift --</option>
            <option value="Pagi">Pagi</option>
            <option value="Siang">Siang</option>
            <option value="Malam">Malam</option>
          </select>
        </div>
        <button class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </section>
</div>

@include('layouts.footer')
