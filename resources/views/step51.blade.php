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
    <div class="border border-secondary-subtle my-1 py-2 pb-3 px-3 bg-white">
        <div class="row">
            <p class="fs-5 text-center">Pemesanan</p>
        </div>
        <div class="row">
            <div class="col">
                <p class="mb-2" style="font-size: 16px">Booking ID: {{$pemesanan->id}}</p>
                <p class="mb-2" style="font-size: 18px">{{$pemesanan->penerbangan->bandara_asal->kota}} - {{$pemesanan->penerbangan->bandara_tujuan->kota}}</p>
                <p class="mb-2" style="font-size: 12px">{{$pemesanan->penerbangan->waktu_berangkat->format('D, d M')}} | {{$pemesanan->pemesanan_harga->kuantitas}} pax |
                    {{($pemesanan->kelas_penerbangan->tipe_kelas == 1) ? 'Ekonomi' : (($pemesanan->kelas_penerbangan->tipe_kelas == 2) ? 'Bisnis' : 'First')}}</p>
            </div>
            <div class="col d-flex justify-content-end align-items-center">
                <p style="font-size: 21px">{{rupiah($pemesanan->pemesanan_harga->total)}} </p>
            </div>
        </div>
    </div>
    <div class="border border-secondary-subtle my-2 py-2 px-3 bg-white">
        <p class="text-center fs-4 mb-0">Kartu Kredit/Debit</p>
        <form method="POST" action="{{route('home.finalized')}}">
            @csrf
            @method('PUT')
            <input type="hidden" name="pemesanan_id" value="{{$pemesanan->id}}">
            <input type="hidden" name="metode_pembayaran" value="1">
            <div class="container mt-4 mb-5">
                <div class="row mb-2">
                    <div class="col">
                        <label for="nomorKartu">Nomor Kartu</label>
                        <br>
                        <input type="text" name="nomorKartu" id="nomorKartu" class="input-other" maxlength="16">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <label for="expiryDate">Expiry Date</label>
                        <br>
                        <input type="text" name="expiryDate" id="expiryDate" class="input-other" maxlength="5" style="width: 80px">
                    </div>
                    <div class="col">
                        <label for="CVV">CVV</label>
                        <br>
                        <input type="text" name="CVV" id="CVV" class="input-other" maxlength="3" style="width: 80px">
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <button type="submit" class="button text-center" style="width: 240px">Bayar</button>
            </div>
        </form>
    </div>
</body>
</html>
