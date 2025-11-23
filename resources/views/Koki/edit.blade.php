@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="m-0">Edit Koki</h1>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <form action="{{ route('koki.update', $koki->ID_Koki) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="Nama" class="form-control" value="{{ $koki->Nama }}" required>
        </div>
        <div class="form-group">
          <label>Shift</label>
          <select name="Shift" class="form-control" required>
            <option value="Pagi" {{ $koki->Shift == 'Pagi' ? 'selected' : '' }}>Pagi</option>
            <option value="Siang" {{ $koki->Shift == 'Siang' ? 'selected' : '' }}>Siang</option>
            <option value="Malam" {{ $koki->Shift == 'Malam' ? 'selected' : '' }}>Malam</option>
          </select>
        </div>
        <button class="btn btn-success">Update</button>
      </form>
    </div>
  </section>
</div>

@include('layouts.footer')
