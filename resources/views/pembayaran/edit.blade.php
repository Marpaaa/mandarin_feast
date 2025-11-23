@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 align-items-center">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Pembayaran</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Form Edit Pembayaran</h3>
        </div>

        <form method="POST" action="{{ route('pembayaran.update', $pembayaran->ID_Pembayaran) }}">
          @csrf
          @method('PUT')

          <div class="card-body">
            <div class="form-group">
              <label>ID Pesanan (Nama Pelanggan)</label>
              <select name="ID_Pesanan" id="ID_Pesanan" class="form-control" onchange="updateTotal()">
                @foreach($pesananList as $pesanan)
                  <option value="{{ $pesanan->ID_Pesanan }}"
                    data-total="{{ $pesanan->Total }}"
                    {{ $pembayaran->ID_Pesanan == $pesanan->ID_Pesanan ? 'selected' : '' }}>
                    {{ $pesanan->ID_Pesanan }} - {{ $pesanan->Nama }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label>Metode Pembayaran</label>
              <select name="Metode_Pembayaran" class="form-control">
                <option value="Tunai" {{ $pembayaran->Metode_Pembayaran == 'Tunai' ? 'selected' : '' }}>Tunai</option>
                <option value="Kartu" {{ $pembayaran->Metode_Pembayaran == 'Kartu' ? 'selected' : '' }}>Kartu</option>
                <option value="QRIS" {{ $pembayaran->Metode_Pembayaran == 'QRIS' ? 'selected' : '' }}>QRIS</option>
              </select>
            </div>

            <div class="form-group">
              <label>Total Bayar</label>
              <input type="number" name="Total_Bayar" id="Total_Bayar" class="form-control" value="{{ $pembayaran->Total_Bayar }}" readonly>
            </div>

            <div class="form-group">
              <label>Waktu Bayar</label>
              <input type="datetime-local" name="Waktu_Bayar" class="form-control" value="{{ \Carbon\Carbon::parse($pembayaran->Waktu_Bayar)->format('Y-m-d\TH:i') }}">
            </div>
          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
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
