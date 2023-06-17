<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-header></x-header>
    <div class="container border border-secondary-subtle my-1 pt-2 pb-3 px-3 bg-white">
        <div class="row">
            <p class="fs-5 text-center">Pemesanan</p>
        </div>
        <div class="row">
            <div class="col">
                <p class="mb-2" style="font-size: 16px">Booking ID: {{$pemesanan->id}}</p>
                <p class="mb-2" style="font-size: 18px">{{$pemesanan->penerbangan->bandara_asal->kota}} - {{$pemesanan->penerbangan->bandara_tujuan->kota}}</p>
                <p class="mb-2" style="font-size: 12px">{{$pemesanan->penerbangan->waktu_berangkat->format('D, d M')}} | {{$pemesanan->pemesanan_harga->kuantitas}} pax |
                    {{($pemesanan->kelas_penerbangan_id == 1) ? 'Ekonomi' : (($pemesanan->kelas_penerbangan_id == 2) ? 'Bisnis' : 'First')}}</p>
            </div>
            <div class="col d-flex justify-content-end align-items-center">
                <p style="font-size: 21px">Rp. {{$pemesanan->pemesanan_harga->total}} </p>
            </div>
        </div>
    </div>
    <p class="fs-5 mt-3 ps-3 mb-2">Metode Pembayaran</p>
    <form method="GET" action="{{route('step5.bayar')}}">
    <div class="">
        @csrf
        <input type="hidden" name="pemesanan_id" value="{{$pemesanan->id}}">
        <div class="border border-secondary-subtle my-0 py-2 px-3 bg-white">
            <input type="radio" id="kartu" name="metode_pembayaran" value="1">
            <label for="kartu">Kartu Kredit/Debit</label>
        </div>
        <div class="border border-secondary-subtle my-0 py-2 px-3 bg-white">
            <input type="radio" id="va" name="metode_pembayaran" value="2">
            <label for="va">Virtual Account</label>
        </div>
        <div class="border border-secondary-subtle my-0 py-2 px-3 bg-white">
            <input type="radio" id="qris" name="metode_pembayaran" value="3">
            <label for="qris">QRIS</label>
        </div>
    </div>
    <div class="text-center mt-5">
        <button type="submit" class="button text-center" style="width: 240px">Bayar</button>
    </form>
</body>
</html>
