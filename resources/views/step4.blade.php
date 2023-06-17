<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-header></x-header>
    <div class="fs-5 text-center mt-1">
        <p>Ringkasan Pemesanan</p>
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
                @if($kelas == 1)
                    <p>Ekonomi</p>
                @elseif($kelas == 2)
                    <p>Bisnis</p>
                @elseif($kelas == 3)
                    <p>First</p>
                @endif
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
            @foreach ($penumpang as $penumpangs)
            <div class="mt-2 pb-2">
                <p class="mb-3" style="font-size:18px">Penumpang {{$loop->iteration}}</p>
                <p class="mb-0" style="font-size: 14px">Nama Lengkap:</p>
                <p class="mb-2">{{$penumpangs['nama']}}</p>
                <p class="mb-0" style="font-size: 14px">No Kursi:</p>
                <p class="mb-2">{{$penumpangs['kursi_penerbangan_id']}}</p>
            </div>
            @endforeach
        </div>
    </div>
    <div>
        <p class="fs-5 mt-3 ps-3 mb-2">Detail Harga</p>
        <div class="search-box d-flex justify-content-between align-items-center py-2" style="border: 1px solid #868686;">
            <p class="my-1">{{$penerbangan->maskapai}} ({{Session::get('harga')['kuantitas']}})</p>
            <p class="my-1">{{Session::get('harga')['biaya_dasar']}}</p>
        </div>
        <div class="search-box d-flex justify-content-between py-2" style="border: 1px solid #868686;">
            <p class="my-1">Biaya Layanan</p>
            <p class="my-1">{{Session::get('harga')['biaya_layanan']}}</p>
        </div>
        <div class="search-box d-flex justify-content-between py-2" style="border: 1px solid #868686;">
            <p class="my-1">Total</p>
            <p class="my-1">{{Session::get('harga')['total']}}</p>
        </div>
    </div>
    <form method="POST" action="{{route('step5', ['penerbangan_id' => $penerbangan->id, 'kelas' => $kelas])}}">
        @csrf
        <div class="text-center mt-5">
            <button type="submit" class="button text-center" style="width: 240px">Lanjutkan</button>
        </div>
    </form>
</body>
</html>
