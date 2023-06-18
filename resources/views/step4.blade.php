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
        <div class="border border-secondary-subtle my-1 pt-2 pb-3 px-3 bg-white">
            <div class="d-flex justify-content-between">
                <p class="mb-0">{{$penerbangan->maskapai}}</p>
                <p class="mb-0">{{$penerbangan->tipe_pesawat}}</p>
            </div>
            <div class="d-flex justify-content-between">
                <p style="font-size: 12px">ID: {{$penerbangan->id}}</p>
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
                <p class="mb-0">{{$penerbangan->waktu_berangkat->format('H:i')}}</p>
                @php
                    $time1 = new DateTime($penerbangan->waktu_berangkat);
                    $time2 = new DateTime($penerbangan->waktu_sampai);
                    $interval = $time1->diff($time2);
                @endphp
                <p class="mb-0 d-flex justify-content-center align-items-end" style="font-size: 12px">{{$interval->format('%hj %im')}}</p>
                <p class="mb-0">{{$penerbangan->waktu_sampai->format('H:i')}}</p>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <img src="{{url('images/Arrow-long.png')}}" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="text-center mb-0" style="font-size: 14px">{{$penerbangan->bandara_asal->kota}} ({{$penerbangan->bandara_asal->kode_bandara}})</p>
                    </div>
                    <div class="col">
                        <p class="text-center mb-0" style="font-size: 14px">{{$penerbangan->bandara_tujuan->kota}} ({{$penerbangan->bandara_tujuan->kode_bandara}})</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="text-center" style="font-size: 14px">Bandara {{$penerbangan->bandara_asal->nama_bandara}}</p>
                    </div>
                    <div class="col">
                        <p class="text-center" style="font-size: 14px">Bandara {{$penerbangan->bandara_tujuan->nama_bandara}}</p>
                    </div>
                </div>
            </div>
            {{-- <div class="d-flex justify-content-between">
                <p class="text-center mb-0">{{$penerbangan->bandara_asal->kota}} ({{$penerbangan->bandara_asal->kode_bandara}})</p>
                <p class="text-center mb-0">{{$penerbangan->bandara_tujuan->kota}} ({{$penerbangan->bandara_tujuan->kode_bandara}})</p>
            </div>
            <div class="d-flex justify-content-between">
                <p class="text-center">{{$penerbangan->bandara_asal->nama_bandara}}</p>
                <p class="text-center">{{$penerbangan->bandara_tujuan->nama_bandara}}</p>
            </div> --}}
        </div>
    </div>
    <div>
        <p class="fs-5 mt-3 ps-3 mb-2">Detail Penumpang</p>
        <div class="border border-secondary-subtle my-1 pt-2 pb-3 px-3 bg-white">
            @foreach ($penumpang as $penumpangs)
            <div class="mt-2 pb-2">
                <p class="mb-3" style="font-size:18px">Penumpang {{$loop->iteration}}</p>
                <p class="mb-0" style="font-size: 14px">Nama Lengkap:</p>
                <p class="mb-2">{{$penumpangs['nama']}}</p>
                <p class="mb-0" style="font-size: 14px">No Kursi:</p>
                <p class="mb-2">{{$penumpangs['kursi_penerbangan']}}</p>
            </div>
            @endforeach
        </div>
    </div>
    <div>
        <p class="fs-5 mt-3 ps-3 mb-2">Detail Harga</p>
        <div class="border border-secondary-subtle my-0 py-2 px-3 bg-white d-flex justify-content-between align-items-center ">
            <p class="my-1">{{$penerbangan->maskapai}} ({{Session::get('harga')['kuantitas']}})</p>
            <p class="my-1">{{Session::get('harga')['biaya_dasar']}}</p>
        </div>
        <div class="border border-secondary-subtle my-0 py-2 px-3 bg-white d-flex justify-content-between align-items-center ">
            <p class="my-1">Biaya Layanan</p>
            <p class="my-1">{{Session::get('harga')['biaya_layanan']}}</p>
        </div>
        <div class="border border-secondary-subtle my-0 py-2 px-3 bg-white d-flex justify-content-between align-items-center ">
            <p class="my-1">Total</p>
            <p class="my-1">{{Session::get('harga')['total']}}</p>
        </div>
    </div>
    <form method="POST" action="{{route('step5', ['penerbangan_id' => $penerbangan->id, 'kelas' => $kelas])}}">
        @csrf
        <div class="text-center mt-5">
            <button type="submit" class="button text-center" style="width: 240px">Pesan</button>
        </div>
    </form>
</body>
</html>
