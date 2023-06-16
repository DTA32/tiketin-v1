<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
<div>
    <p>Pemesanan</p>
    <p>Booking ID: {{$pemesanan->id}}</p>
    {{-- <p>Total: {{$harga->total}}</p> !!! ngebug? !!! --}}
</div>
<div>
    <p>Metode Pembayaran</p>
    <form method="GET" action="{{route('step5.bayar')}}">
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
        <button type="submit">Lanjutkan</button>
    </form>
</div>
</body>
</html>
