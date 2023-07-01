<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-headerBack></x-headerBack>
    <div>
        @if ($pemesanan == null)
        <p class="text-center text-danger mt-5 fw-bold fs-3">History not found or doesn't exist</p>
        @else
        <div class="fs-5 text-center mt-1">
            <p>Pemesanan</p>
        </div>
        <div class="border border-secondary-subtle py-1 px-3 bg-white d-flex justify-content-between align-items-center">
            <p class="my-1">Booking ID</p>
            <p class="my-1">{{$pemesanan->id}}</p>
        </div>
        <div class="border border-secondary-subtle py-1 px-3 bg-white d-flex justify-content-between align-items-center py-2" style="border: 1px solid #868686;">
            <p class="my-1">Status</p>
            @if ($pemesanan->status)
                <p class="text-center mb-0 px-4 bg-success text-light rounded-pill">Berhasil</p>
            @else
                <p class="text-center mb-0 px-4 bg-danger text-light rounded-pill">Gagal</p>
            @endif
        </div>
        <div>
            <p class="fs-5 mt-3 ps-3 mb-2">Penerbangan</p>
            <div class="border border-secondary-subtle my-1 pt-2 pb-3 px-3 bg-white">
                <div class="d-flex justify-content-between">
                    <p class="mb-0">{{$pemesanan->penerbangan->maskapai}}</p>
                    <p class="mb-0">{{$pemesanan->penerbangan->tipe_pesawat}}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p style="font-size: 12px">ID: {{$pemesanan->penerbangan->id}}</p>
                    <p>{{($pemesanan->kelas_penerbangan_id == 1) ? 'Ekonomi' : (($pemesanan->kelas_penerbangan_id == 2) ? 'Bisnis' : 'First')}}</p>
                </div>
                <div class="d-flex justify-content-center">
                    <p class="mb-0">{{$pemesanan->penerbangan->waktu_berangkat->format('D, d M Y')}}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="mb-0">{{$pemesanan->penerbangan->waktu_berangkat->format('H:i')}}</p>
                    @php
                        $time1 = new DateTime($pemesanan->penerbangan->waktu_berangkat);
                        $time2 = new DateTime($pemesanan->penerbangan->waktu_sampai);
                        $interval = $time1->diff($time2);
                    @endphp
                    <p class="mb-0 d-flex justify-content-center align-items-end" style="font-size: 12px">{{$interval->format('%hj %im')}}</p>
                    <p class="mb-0">{{$pemesanan->penerbangan->waktu_sampai->format('H:i')}}</p>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{url('images/Arrow-long.png')}}" alt="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <p class="text-center mb-0" style="font-size: 14px">{{$pemesanan->penerbangan->bandara_asal->kota}} ({{$pemesanan->penerbangan->bandara_asal->kode_bandara}})</p>
                        </div>
                        <div class="col">
                            <p class="text-center mb-0" style="font-size: 14px">{{$pemesanan->penerbangan->bandara_tujuan->kota}} ({{$pemesanan->penerbangan->bandara_tujuan->kode_bandara}})</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="text-center" style="font-size: 14px">{{$pemesanan->penerbangan->bandara_asal->nama_bandara}}</p>
                        </div>
                        <div class="col">
                            <p class="text-center" style="font-size: 14px">{{$pemesanan->penerbangan->bandara_tujuan->nama_bandara}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <p class="fs-5 mt-3 ps-3 mb-2">Detail Penumpang</p>
            <div class="border border-secondary-subtle my-1 pt-2 pb-3 px-3 bg-white">
            @foreach ($pemesanan->pemesanan_penumpang as $penumpang)
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
            <div class="border border-secondary-subtle py-1 px-3 bg-white d-flex justify-content-between align-items-center">
                <p class="my-1">{{($pemesanan->penerbangan->maskapai)}} ({{$pemesanan->pemesanan_harga->kuantitas}}x)</p>
                <p class="my-1">{{rupiah($pemesanan->pemesanan_harga->biaya_dasar)}}</p>
            </div>
            <div class="border border-secondary-subtle py-1 px-3 bg-white d-flex justify-content-between">
                <p class="my-1">Biaya Layanan</p>
                <p class="my-1">{{rupiah($pemesanan->pemesanan_harga->biaya_layanan)}}</p>
            </div>
            <div class="border border-secondary-subtle py-1 px-3 bg-white d-flex justify-content-between">
                <p class="my-1">Total</p>
                <p class="my-1">{{rupiah($pemesanan->pemesanan_harga->total)}}</p>
            </div>
        </div>
        @if ($pemesanan->status == 1)
        <div>
            <p class="fs-5 mt-3 ps-3 mb-2">Metode Pembayaran</p>
            <div class="border border-secondary-subtle my-1 pt-2 pb-3 px-3 bg-white">
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
        <a class="text-black text-decoration-none" href="{{route('under_construction')}}">
            <div class="border border-secondary-subtle mt-3 py-2 px-3 bg-white" style="border: 1px solid #868686">
                <img src="{{url('images/ic_baseline-local-printshop.png')}}" alt="">
                <span class="ps-2">Print E-Ticket</span>
            </div>
        </a>
        @endif
        <div class="text-center pb-4" style="margin-top: 120px">
            <p class="fs-5 mb-0">Butuh bantuan?</p>
            <a class="d-inline-block button text-center text-decoration-none pt-1" href="{{route('under_construction')}}" style="width: 240px;">Hubungi Kami</a>
        </div>
        @endif
    </div>
</body>
</html>
