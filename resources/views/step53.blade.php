<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <div>
        <p>Pemesanan</p>
        <p>Booking ID: {{$pemesanan_id}}</p>
    </div>
    <div>
        <p>QRIS</p>
        <img src="{{url('/images/frame.png')}}" alt="">
        <p>Selesaikan pembayaran dalam</p>
        <p>countdown</p>
        <p>Pembayaran anda akan diproses otomatis,
            tekan tombol dibawah jika sudah membayar
            namun belum diproses</p>
        <form method="POST" action="{{route('home.finalized')}}">
            @csrf
            @method('PUT')
            <input type="hidden" name="pemesanan_id" value="{{$pemesanan_id}}">
            <input type="hidden" name="metode_pembayaran" value="3">
            <button type="submit">Saya sudah membayar</button>
        </form>
    </div>
</body>
</html>
