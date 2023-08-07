<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<style>
    .labl > input{
        display: none;
        visibility: hidden;
    }
    .labl > div{
        cursor: pointer;
    }
    .labl > input:checked + div  {
        background-color: #ECECEC;
    }
</style>
<body>
    <x-header></x-header>
    <div>
        <div class="progress mt-1" role="progressbar" aria-label="Progress" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-secondary" style="width:68%"></div>
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
    <div class="container border border-secondary-subtle my-1 pt-2 pb-3 px-3 bg-white">
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
    <p class="fs-5 mt-3 ps-3 mb-2">Metode Pembayaran</p>
    <form method="GET" action="{{route('step5.bayar')}}">
        @csrf
        <input name="pemesanan_id" type="hidden" value="{{$pemesanan->id}}">
        <div class="bg-white">
            <label for="kartu" class="labl w-100">
                <input type="radio" id="kartu" name="metode_pembayaran" value="1">
                <div class="border border-secondary-subtle my-0 py-2 px-3">
                    Kartu Kredit/Debit
                    <span class="ms-1"> <img src="{{url('images/payment_1.png')}}" alt="" style="height: 24px"></span>
                </div>
            </label>
            <label for="va" class="labl w-100">
                <input type="radio" id="va" name="metode_pembayaran" value="2">
                <div class="border border-secondary-subtle my-0 py-2 px-3">
                    Virtual Account
                    <span class="ms-1"> <img src="{{url('images/mdi_bank.png')}}" alt="" style="height: 24px"></span>
                </div>
            </label>
            <label for="qris" class="labl w-100">
                <input type="radio" id="qris" name="metode_pembayaran" value="3">
                <div class="border border-secondary-subtle my-0 py-2 px-3">
                    QRIS
                    <span class="ms-1"> <img src="{{url('images/qris.jpg')}}" alt="" style="height: 24px"></span>
                </div>
            </label>
        </div>
    <div class="text-center mt-5">
        <button type="submit" class="button text-center" style="width: 240px">Bayar</button>
    </form>
</body>
</html>
