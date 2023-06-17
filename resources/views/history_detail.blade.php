<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-headerBack></x-headerBack>
    <div>
        <div class="fs-5 text-center mt-1">
            <p>Pemesanan</p>
        </div>
        <div class="search-box d-flex justify-content-between align-items-center py-2" style="border: 1px solid #868686;">
            <p class="my-1">Booking ID</p>
            <p class="my-1">{{$pemesanan->id}}</p>
        </div>
        <div class="search-box d-flex justify-content-between align-items-center py-2" style="border: 1px solid #868686;">
            <p class="my-1">Status</p>
            @if ($pemesanan->status == 0)
                <p class="text-center px-2 my-0" style="background: lightgray; border-radius: 12px;">Belum dibayar</p>
            @elseif ($pemesanan->status == 1)
                <p class="text-center px-4 my-0" style="background: #A8FF9A; border-radius: 12px;">Berhasil</p>
            @endif
        </div>
        <div>
            <p class="fs-5 mt-3 ps-3 mb-2">Penerbangan</p>
            <div class="search-box" style="margin-top: 4px; padding-top:8px; padding-bottom:16px; border: 1px solid #868686;">
                <div class="d-flex justify-content-between">
                    <p class="mb-0">{{$penerbangan->maskapai}}</p>
                    <p class="mb-0">{{$penerbangan->tipe_pesawat}}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p style="font-size: 12px">ID Penerbangan: {{$penerbangan->id}}</p>
                    <p>Ekonomi</p> {{-- EDIT !!! --}}
                </div>
                <div class="d-flex justify-content-center">
                    <p class="mb-0">{{$penerbangan->waktu_berangkat->format('D, d M Y')}}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>{{$penerbangan->waktu_berangkat->format('H:i')}}</p>
                    <p>{{$penerbangan->waktu_sampai->format('H:i')}}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>{{searchPenerbanganFull($penerbangan->id)->kota_asal}}</p>
                    <p>{{searchPenerbanganFull($penerbangan->id)->kota_tujuan}}</p>
                </div>
            </div>
        </div>
        <div>
            <p class="fs-5 mt-3 ps-3 mb-2">Detail Penumpang</p>
            <div class="search-box" style="margin-top: 4px; padding-top:8px; padding-bottom:16px; border: 1px solid #868686;">
            @foreach ($pemesanan_penumpang as $penumpang)
                <div class="mt-2 pb-2">
                    <p class="mb-3" style="font-size:18px">Penumpang {{$loop->iteration}}</p>
                    <p class="mb-0" style="font-size: 14px">Nama Lengkap:</p>
                    <p class="mb-2">{{$penumpang->nama}}</p>
                    <p class="mb-0" style="font-size: 14px">No Kursi:</p>
                    <p class="mb-2">{{$penumpang->kursi_penerbangan}}</p>
                </div>
            @endforeach
        </div>
        <div>
            <p class="fs-5 mt-3 ps-3 mb-2">Detail Harga</p>
            <div class="search-box d-flex justify-content-between align-items-center py-2" style="border: 1px solid #868686;">
                <p class="my-1">{{$penerbangan->maskapai}} ({{$pemesanan_harga->kuantitas}}x)</p>
                <p class="my-1">{{$pemesanan_harga->biaya_dasar}}</p>
            </div>
            <div class="search-box d-flex justify-content-between py-2" style="border: 1px solid #868686;">
                <p class="my-1">Biaya Layanan</p>
                <p class="my-1">{{$pemesanan_harga->biaya_layanan}}</p>
            </div>
            <div class="search-box d-flex justify-content-between py-2" style="border: 1px solid #868686;">
                <p class="my-1">Total</p>
                <p class="my-1">{{$pemesanan_harga->total}}</p>
            </div>
        </div>
        <div>
            <p class="fs-5 mt-3 ps-3 mb-2">Metode Pembayaran</p>
            <div class="search-box" style="margin-top: 4px; padding-top:8px; padding-bottom:16px; border: 1px solid #868686;">
                @if ($pemesanan->metode_pembayaran == 1)
                <p class="mb-3 fs-5">Kartu Kredit/Debit</p>
                @elseif ($pemesanan->metode_pembayaran == 2)
                <p class="mb-3 fs-5">Virtual Account</p>
                @elseif ($pemesanan->metode_pembayaran == 3)
                <p class="mb-3 fs-5">QRIS</p>
                @endif
                <div class="d-flex justify-content-between">
                    <p class="mb-2">No. Referensi</p>
                    <p class="mb-2">{{$pemesanan->referensi_pembayaran}}</p>
                </div>
            </div>
        </div>
        <div class="search-box py-2 mt-4" style="border: 1px solid #868686; cursor: pointer;">
            <p class="my-1">Print E-Ticket</p>
        </div>
        <div class="text-center mb-4" style="margin-top: 120px">
            <p class="fs-5 mb-0">Butuh bantuan?</p>
            <button class="button text-center" style="width: 240px">Hubungi Kami</button>
        </div>
    </div>
</body>
</html>
