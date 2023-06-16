<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-headerBack></x-headerBack>
    <div>
        <p>Pemesanan</p>
        <p>Booking ID: {{$pemesanan->id}}</p>
        @if ($pemesanan->status == 0)
        <p>Status: Belum dibayar</p>
        @elseif ($pemesanan->status == 1)
        <p>Status: Sudah dibayar</p>
        @endif
        <div>
            <div>
                <p>Penerbangan</p>
                <div>
                    <p>{{$penerbangan->maskapai}}</p>
                    <p>ID: {{$penerbangan->id}}</p>
                    <p>{{$penerbangan->tipe_pesawat}}</p>
                    @if($penerbangan->kelas_penerbangan_id == 1)
                        <p>Ekonomi</p>
                    @elseif($penerbangan->kelas_penerbangan_id == 2)
                        <p>Bisnis</p>
                    @elseif($penerbangan->kelas_penerbangan_id == 3)
                        <p>First</p>
                    @endif
                </div>
                <p>{{$penerbangan->waktu_berangkat->format('D, d M y')}}</p>
                <p>{{$penerbangan->waktu_berangkat->format('H:i')}}</p>
                <p>{{$penerbangan->waktu_sampai->format('H:i')}}</p>
                <p>{{searchPenerbanganFull($penerbangan->id)->kota_asal}}</p>
                <p>{{searchPenerbanganFull($penerbangan->id)->kota_tujuan}}</p>
            </div>
            {{-- <div>
                <p>Detail Penumpang</p>
                @for ($i = 0; $i < $pemesanan_harga->kuantitas; $i++)
                    <div>
                        <p>Penumpang {{$i+1}}</p>
                        <p>Nama Lengkap: {{$pemesanan_penumpang->nama}}</p>
                        <p>No Kursi: {{$pemesanan_penumpang->kursi_penerbangan_id}}</p>
                    </div>
                @endfor
            </div> --}}
            <div>
                <p>Detail Penumpang</p>
                @foreach ($pemesanan_penumpang as $penumpang)
                    <div>
                        <p>Penumpang {{$loop->iteration}}</p>
                        <p>Nama Lengkap: {{$penumpang->nama}}</p>
                        <p>No Kursi: {{$penumpang->kursi_penerbangan_id}}</p>
                    </div>
                @endforeach
            </div>
            <div>
                <p>Detail Harga</p>
                <p>{{$penerbangan->maskapai}} ({{$pemesanan_harga->kuantitas}}x) : {{$pemesanan_harga->biaya_dasar}}</p>
                <p>Biaya Layanan : {{$pemesanan_harga->biaya_layanan}}</p>
                <p>Total : {{$pemesanan_harga->total}}</p>
            </div>
            <div>
                <p>Metode Pembayaran</p>
                @if ($pemesanan->metode_pembayaran == 1)
                <p>Kartu Kredit/Debit</p>
                @elseif ($pemesanan->metode_pembayaran == 2)
                <p>Virtual Account</p>
                @elseif ($pemesanan->metode_pembayaran == 3)
                <p>QRIS</p>
                @endif
                <p>No. Referensi: {{$pemesanan->referensi_pembayaran}}</p>
            </div>
    </div>
</body>
</html>
