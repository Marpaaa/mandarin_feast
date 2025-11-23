@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 align-items-center">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Pembayaran</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Form Tambah Pembayaran</h3>
        </div>

        <form method="POST" action="{{ route('pembayaran.store') }}">
          @csrf

          <div class="card-body">
            <div class="form-group">
              <label>ID Pesanan (Nama Pelanggan)</label>
              <select name="ID_Pesanan" id="ID_Pesanan" class="form-control" onchange="updateTotal()">
                <option value="">-- Pilih Pesanan --</option>
                @foreach($pesananList as $pesanan)
                  <option value="{{ $pesanan->ID_Pesanan }}" data-total="{{ $pesanan->Total }}">
                    {{ $pesanan->ID_Pesanan }} - {{ $pesanan->Nama }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label>Metode Pembayaran</label>
              <select name="Metode_Pembayaran" class="form-control">
                <option value="Tunai">Tunai</option>
                <option value="Kartu">Kartu</option>
                <option value="QRIS">QRIS</option>
              </select>
            </div>

            <div class="form-group">
              <label>Total Bayar</label>
              <input type="number" name="Total_Bayar" id="Total_Bayar" class="form-control" readonly>
            </div>

            <div class="form-group">
              <label>Waktu Bayar</label>
              <input type="datetime-local" name="Waktu_Bayar" class="form-control" value="{{ now()->format('Y-m-d\TH:i') }}">
            </div>
          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

<script>
function updateTotal() {
  const select = document.getElementById('ID_Pesanan');
  const selectedOption = select.options[select.selectedIndex];
  const total = selectedOption.getAttribute('data-total');
  document.getElementById('Total_Bayar').value = total;
}
</script>

@include('layouts.footer')
