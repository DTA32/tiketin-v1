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
                    <h4 class="text-center mb-0">{{$results[0]->bandara_asal->kota}} - {{$results[0]->bandara_tujuan->kota}}</h4>
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
        <div class="border border-secondary-subtle my-1 pt-2 pb-3 px-3 bg-white">
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
                                @php
                                    $time1 = new DateTime($hasil->waktu_berangkat);
                                    $time2 = new DateTime($hasil->waktu_sampai);
                                    $interval = $time1->diff($time2);
                                @endphp
                                <p class="col mb-0" style="font-size: 12px">{{$interval->format('%hj %im')}}</p>
                                <p class="fs-6 col mb-0">{{date('H:i', strtotime($hasil->waktu_sampai))}}</p>
                            </div>
                            <div class="row text-center">
                                <p class="fs-6 col">{{$hasil->bandara_asal->kode_bandara}}</p>
                                <p class="fs-6 col">-></p>
                                <p class="fs-6 col">{{$hasil->bandara_tujuan->kode_bandara}}</p>
                            </div>
                            <div class="row">
                                <p class="fs-5">Rp.{{$hasil->kelas_penerbangan[0]->harga}}</p>
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
