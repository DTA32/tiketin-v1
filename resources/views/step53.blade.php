<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-header></x-header>
    <div>
        <div class="progress mt-1" role="progressbar" aria-label="Progress" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-secondary" style="width:85%"></div>
        </div>
        <div class="d-flex justify-content-between">
            <span style="font-size: 10px"> </span>
            <span style="font-size: 10px">1</span>
            <span style="font-size: 10px">2</span>
            <span style="font-size: 10px">3</span>
            <span style="font-size: 10px">4</span>
            <span style="font-size: 10px">5</span>
            <span style="font-size: 10px"> </span>
        </div>
    </div>
    <div class="border border-secondary-subtle my-1 pb-3 py-2 px-3 bg-white">
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
                <p style="font-size: 21px">{{rupiah($pemesanan->pemesanan_harga->total)}} </p>
            </div>
        </div>
    </div>
    <div class="border border-secondary-subtle my-2 py-2 px-3 bg-white">
        <p class="text-center fs-4 mb-0">QRIS</p>
        <div class="d-flex justify-content-center">
            <img src="{{url('/images/frame.png')}}" alt="qris">
        </div>
        <div class="d-flex justify-content-center">
            <p class="mb-0">Selesaikan pembayaran dalam</p>
        </div>
        <div class="d-flex justify-content-center">
            <p id="countdown"></p>
        </div>
        <p style="font-size: 14px">Pembayaran anda akan diproses otomatis,
            tekan tombol dibawah jika sudah membayar
            namun belum diproses</p>
        <form method="POST" action="{{route('home.finalized')}}">
            @csrf
            @method('PUT')
            <input type="hidden" name="pemesanan_id" value="{{$pemesanan->id}}">
            <input type="hidden" name="metode_pembayaran" value="3">
            <input type="hidden" name="referensi_pembayaran" value="{{'QRIS-'.rand(1000,9999)}}">
            <div class="text-center mt-5">
                <button type="submit" class="button text-center" style="width: 240px">Saya sudah membayar</button>
            </div>
        </form>
    </div>
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date();
        countDownDate.setMinutes(countDownDate.getMinutes() + 10);

        // Update the count down every 1 second
        var x = setInterval(function() {

          // Get today's date and time
          var now = new Date().getTime();

          // Find the distance between now and the count down date
          var distance = countDownDate - now;

          // Time calculations for days, hours, minutes and seconds
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          // Display the result in the element with id="demo"
          document.getElementById("countdown").innerHTML = minutes + " menit " + seconds + " detik ";

          // If the count down is finished, write some text
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "Expired";
          }
        }, 1000);
    </script>
</body>
</html>
