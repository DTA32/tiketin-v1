<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-headerBack></x-headerBack>
    <div>
        <div class="progress mt-1" role="progressbar" aria-label="Progress" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-secondary" style="width:17%"></div>
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
    <div class="border border-secondary-subtle my-1 pt-2 pb-3 px-3 bg-white">
        <p class="fs-5 text-center">Penerbangan</p>
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-start align-items-center">
                    <p>{{$penerbangan->maskapai}}</p>
                </div>
                <div class="col">
                    <div class="row">
                        <p class="col text-center mb-0">{{$penerbangan->waktu_berangkat->format('D, d M Y')}}</p>
                    </div>
                    <div class="row text-center">
                        <p class="col mb-0">{{date('H:i', strtotime($penerbangan->waktu_berangkat))}}</p>
                        @php
                            $time1 = new DateTime($penerbangan->waktu_berangkat);
                            $time2 = new DateTime($penerbangan->waktu_sampai);
                            $interval = $time1->diff($time2);
                        @endphp
                        <p class="col mb-0 d-flex justify-content-center align-items-end" style="font-size: 12px">{{$interval->format('%hj %im')}}</p>
                        <p class="fs-6 col mb-0">{{date('H:i', strtotime($penerbangan->waktu_sampai))}}</p>
                    </div>
                    <div class="row text-center">
                        <p class="fs-6 col" style="font-size: 14px">{{$penerbangan->bandara_asal->kode_bandara}}</p>
                        <img src="{{url('images/mdi_arrow-right-thin.png')}}" alt="" class="col" style="width: 54px; height:24px">
                        <p class="fs-6 col" style="font-size: 14px">{{$penerbangan->bandara_tujuan->kode_bandara}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="fs-5 mt-3 ps-3">Detail Penumpang</p>
    <form method="POST" action="{{route('step3')}}">
        @csrf
        <input type="hidden" name="penerbangan_id" value="{{$penerbangan->id}}">
        <input type="hidden" name="kelas" value="{{$kelas}}">
        <div class="my-1 pt-2 pb-3 px-3 bg-white">
            @for ($i = 1; $i <= $penumpang; $i++)
                <div class="mt-2 pb-2">
                    <p class="mb-2" style="font-size:18px">Penumpang {{$i}}</p>
                    <label for="nama_lengkap[]">Nama Lengkap</label>
                    <br>
                    <input type="text" name="nama_lengkap[]" id="nama_lengkap[]" class="input-other">
                </div>
            @endfor
        </div>
        <div class="text-center mt-5 pb-3">
            <button type="submit" class="button text-center" style="width: 240px">Lanjutkan</button>
        </div>
    </form>
</body>
</html>
