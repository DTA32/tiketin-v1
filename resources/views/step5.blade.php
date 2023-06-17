<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-header></x-header>
    <div class="search-box container" style="margin-top: 8px; padding-top:8px; border: 1px solid #868686">
        <div class="row">
            <p class="fs-5 text-center">Pemesanan</p>
        </div>
        <div class="row">
            <div class="col">
                <p style="font-size: 16px">Booking ID: {{$pemesanan->id}}</p>
            </div>
            <div class="col d-flex justify-content-end align-items-center">
                <p style="font-size: 21px">Rp. {{Session::get('harga')['total']}} </p>
            </div>
        </div>
    </div>
    <p class="fs-5 mt-3 ps-3 mb-2">Metode Pembayaran</p>
    <form method="GET" action="{{route('step5.bayar')}}">
    <div class="search-box" style="margin-top: 8px; padding-top:8px; border: 1px solid #868686">
        @csrf
        <input type="hidden" name="pemesanan_id" value="{{$pemesanan->id}}">
        <div>
            <input type="radio" id="kartu" name="metode_pembayaran" value="1">
            <label for="kartu">Kartu Kredit/Debit</label>
        </div>
        <div>
            <input type="radio" id="va" name="metode_pembayaran" value="2">
            <label for="va">Virtual Account</label>
        </div>
        <div>
            <input type="radio" id="qris" name="metode_pembayaran" value="3">
            <label for="qris">QRIS</label>
        </div>
    </div>
    <div class="text-center mt-5">
        <button type="submit" class="button text-center" style="width: 240px">Bayar</button>
    </form>
</body>
</html>
