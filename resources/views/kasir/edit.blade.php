@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="m-0">Edit Kasir</h1>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <form action="{{ route('kasir.update', $kasir->ID_Kasir) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="Nama" class="form-control" value="{{ $kasir->Nama }}" required>
        </div>
        <div class="form-group">
          <label>Shift</label>
          <select name="Shift" class="form-control" required>
            <option value="Pagi" {{ $kasir->Shift == 'Pagi' ? 'selected' : '' }}>Pagi</option>
            <option value="Siang" {{ $kasir->Shift == 'Siang' ? 'selected' : '' }}>Siang</option>
            <option value="Malam" {{ $kasir->Shift == 'Malam' ? 'selected' : '' }}>Malam</option>
          </select>
        </div>
        <button class="btn btn-success">Update</button>
      </form>
    </div>
  </section>
</div>

@include('layouts.footer')
