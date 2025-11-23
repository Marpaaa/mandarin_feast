@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="m-0">Edit Pelayan</h1>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <form action="{{ route('pelayan.update', $pelayan->ID_Pelayan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="Nama" class="form-control" value="{{ $pelayan->Nama }}" required>
        </div>
        <div class="form-group">
          <label>Shift</label>
          <select name="Shift" class="form-control" required>
            <option value="Pagi" {{ $pelayan->Shift == 'Pagi' ? 'selected' : '' }}>Pagi</option>
            <option value="Siang" {{ $pelayan->Shift == 'Siang' ? 'selected' : '' }}>Siang</option>
            <option value="Malam" {{ $pelayan->Shift == 'Malam' ? 'selected' : '' }}>Malam</option>
          </select>
        </div>
        <button class="btn btn-success">Update</button>
      </form>
    </div>
  </section>
</div>

@include('layouts.footer')
