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
                <p style="font-size: 16px">Booking ID: {{$pemesanan_id}}</p>
            </div>
            <div class="col d-flex justify-content-end align-items-center">
                <p style="font-size: 21px">Rp. {{Session::get('harga')['total']}} </p>
            </div>
        </div>
    </div>
    <div class="search-box container" style="margin-top: 8px; padding-top:8px; border: 1px solid #868686">
        <p class="text-center fs-4 mb-0">Virtual Account</p>
        <div class="d-flex justify-content-center mt-5">
            <p class="mb-0">Nomor Virtual Account:</p>
        </div>
        @php
            $va = rand(100000000000,999999999999);
        @endphp
        <div class="d-flex justify-content-center">
            <p class="mb-0 fs-5">{{$va}}</p>
        </div>
        <div class="d-flex justify-content-center mt-5">
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
            <input type="hidden" name="pemesanan_id" value="{{$pemesanan_id}}">
            <input type="hidden" name="metode_pembayaran" value="2">
            <input type="hidden" name="referensi_pembayaran" value="{{'VA-'.$va}}">
            <div class="text-center mt-5">
                <button type="submit" class="button text-center" style="width: 240px">Saya sudah membayar</button>
            </div>
        </form>
    </div>
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date();
        countDownDate.setMinutes(countDownDate.getMinutes() + 30);

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
