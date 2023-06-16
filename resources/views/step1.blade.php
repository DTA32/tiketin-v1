<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    {{-- header --}}
    <div class="header-container container text-center">
        <div class="row justify-content-center align-items-center w-100 h-100 mx-0">
            <div class="col-3">
                <a href="{{url()->previous()}}" class=""><img src="{{url('images/mdi_arrow-left.png')}}" alt=""></a>
            </div>
            <div class="col-6">
                <div class="row">
                    <h4 class="text-center mb-0">{{$results[0]->kota_asal}} - {{$results[0]->kota_tujuan}}</h4>
                </div>
                <div class="row">
                    <p class="text-center mb-0" style="font-size:12px">
                        {{date('D d M ', strtotime($results[0]->waktu_berangkat))}}
                        | {{$penumpang}} pax |
                        @if ($kelas == 1)
                        Ekonomi
                        @elseif($kelas == 2)
                        Bisnis
                        @elseif($kelas == 3)
                        First
                        @endif
                    </p>
                </div>
            </div>
            <div class="col">
                <img src="{{url('/images/logo.png')}}" alt="logo" class="logo">
            </div>
        </div>
    </div>
    {{-- body --}}
    <div>
        @foreach($results as $hasil)
        <div class="search-box" style="margin-top: 4px; padding-top:8px; border-bottom: 0.1px solid;">
            <form method="GET" action="{{route('step2')}}">
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
