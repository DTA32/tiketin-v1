<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-headerBack></x-headerBack>
    <div class="search-box" style="margin-top: 8px; padding-top:8px; border: 1px solid #868686">
        <p class="fs-5 text-center">Penerbangan</p>
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-start align-items-center">
                    <p>{{$penerbangan->maskapai}}</p>
                </div>
                <div class="col">
                    <div class="row">
                        <p class="col text-center mb-0">{{$penerbangan->waktu_berangkat->format('D, d M y')}}</p>
                    </div>
                    <div class="row">
                        <p class="col text-center mb-0">{{$penerbangan->waktu_berangkat->format('H:i')}}</p>
                        <p class="col text-center mb-0">{{$penerbangan->waktu_sampai->format('H:i')}}</p>
                    </div>
                    <div class="row">
                        <p class="col text-center mb-0" style="font-size: 12px">{{$penerbangan->bandara_asal->kode_bandara}}</p>
                        <p class="col text-center mb-0" style="font-size: 12px">{{$penerbangan->bandara_tujuan->kode_bandara}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="fs-5 mt-3 ps-3">Detail Penumpang</p>
    <form method="POST" action="{{route('step4')}}">
        @csrf
        <input type="hidden" name="penerbangan_id" value="{{$penerbangan->id}}">
        <input type="hidden" name="kelas" value="{{$kelas}}">
        <div class="search-box" style="margin-top: 4px; padding-top:8px; padding-bottom:16px">
            @for ($i = 1; $i <= $penumpang; $i++)
                <div class="mt-2 pb-2">
                    <p class="mb-2" style="font-size:18px">Penumpang {{$i}}</p>
                    <label for="nama_lengkap[]">Nama Lengkap</label>
                    <br>
                    <input type="text" name="nama_lengkap[]" id="nama_lengkap[]" class="input-text">
                </div>
            @endfor
        </div>
        <div class="text-center mt-5">
            <button type="submit" class="button text-center" style="width: 240px">Lanjutkan</button>
        </div>
    </form>
</body>
</html>
