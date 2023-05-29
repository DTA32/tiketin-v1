<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-header></x-header>
    <div>
        @foreach($results as $hasil)
        <div class="search-box" style="margin-top: 4px; padding-top:8px">
            <form method="GET" action="{{route('step2', ['penerbangan_id' => $hasil->id, 'penumpang' => $penumpang, 'kelas' => $kelas])}}">
                <input type="hidden" name="penerbangan_id" value="{{$hasil->id}}">
                <input type="hidden" name="penumpang" value="{{$penumpang}}">
                <input type="hidden" name="kelas" value="{{$kelas}}">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <p class="fs-5">{{$hasil->maskapai}}</p>
                            <div class="row text-center">
                                <p class="fs-6 col mb-0">{{date('H:i', strtotime($hasil->waktu_berangkat))}}</p>
                                <p class="fs-6 col mb-0">{{date('H:i', strtotime($hasil->waktu_sampai))}}</p>
                            </div>
                            <div class="row text-center">
                                <p class="fs-6 col">{{$hasil->kota_asal}}</p>
                                <p class="fs-6 col">{{$hasil->kota_tujuan}}</p>
                            </div>
                            <div class="row">
                                <p class="fs-5">Rp.{{$hasil->harga}}</p>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-end align-items-center">
                            <button type="submit" style="outline:none; border:none; padding:0px"><img src="/images/next.png" alt=""></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @endforeach
    </div>
</body>
</html>
