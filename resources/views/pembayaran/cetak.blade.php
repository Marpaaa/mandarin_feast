<!DOCTYPE html>
<html>
<head>
    <title>Struk Pembayaran</title>
</head>
<body>
    <h2>Struk Pembayaran</h2>

    <p><strong>Nama Pelanggan:</strong> {{ $pembayaran->pesanan->pelanggan->Nama }}</p>
    <p><strong>Menu:</strong> {{ $pembayaran->pesanan->menu->Nama_Menu }}</p>
    <p><strong>Jumlah:</strong> {{ $pembayaran->pesanan->Jumlah }}</p>
    <p><strong>Total:</strong> Rp {{ number_format($pembayaran->Total_Bayar) }}</p>
    <p><strong>Metode Pembayaran:</strong> {{ $pembayaran->Metode_Pembayaran }}</p>
    <p><strong>Tanggal Pembayaran:</strong> {{ \Carbon\Carbon::parse($pembayaran->Waktu_Bayar)->format('d-m-Y H:i') }}</p>

    <br>
    <button onclick="window.print()">Cetak</button>
</body>
</html>
