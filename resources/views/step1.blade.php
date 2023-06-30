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
                    <h4 class="text-center mb-0" style="white-space: nowrap">{{$results[0]->bandara_asal->kota}} - {{$results[0]->bandara_tujuan->kota}}</h4>
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
                <a href="{{route('home')}}">
                    <img src="{{url('/images/logo.png')}}" alt="logo" class="logo">
                </a>
            </div>
        </div>
    </div>
    {{-- body --}}
    <div>
        <div>
            <div class="progress mt-1" role="progressbar" aria-label="Progress" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
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
        <div class="container row mt-1 mb-2 py-1 mx-0 border border-secondary-subtle bg-white">
            <div class="col border-end border-secondary-subtle d-flex justify-content-center align-items-center" style="cursor: pointer">
                <img src="{{url('images/mdi_filter.png')}}" alt="" width="24px" height="24px">
                <p class="ps-2 fs-5 mb-0">Filter</p>
            </div>
            <div class="col d-flex justify-content-center align-items-center" style="cursor: pointer">
                <img src="{{url('images/mdi_sort.png')}}" alt="" width="24px" height="24px">
                <p class="ps-2 text-center fs-5 mb-0">Sort</p>
            </div>
        </div>
        @foreach($results as $hasil)
        <a class="text-black text-decoration-none" href="{{route('step2', ['penerbangan_id' => $hasil->id, 'penumpang' => $penumpang, 'kelas' => $kelas])}}">
            <div class="border border-secondary-subtle my-1 pt-2 pb-3 px-3 bg-white">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <p class="fs-5">{{$hasil->maskapai}}</p>
                            <div class="row text-center">
                                <p class="col mb-0">{{date('H:i', strtotime($hasil->waktu_berangkat))}}</p>
                                @php
                                    $time1 = new DateTime($hasil->waktu_berangkat);
                                    $time2 = new DateTime($hasil->waktu_sampai);
                                    $interval = $time1->diff($time2);
                                @endphp
                                <p class="col mb-0 d-flex justify-content-center align-items-end" style="font-size: 12px">{{$interval->format('%hj %im')}}</p>
                                <p class="fs-6 col mb-0">{{date('H:i', strtotime($hasil->waktu_sampai))}}</p>
                            </div>
                            <div class="row text-center">
                                <p class="fs-6 col" style="font-size: 14px">{{$hasil->bandara_asal->kode_bandara}}</p>
                                <img src="{{url('images/mdi_arrow-right-thin.png')}}" alt="" class="col" style="width: 54px; height:24px">
                                <p class="fs-6 col" style="font-size: 14px">{{$hasil->bandara_tujuan->kode_bandara}}</p>
                            </div>
                            <div class="row">
                                <p class="fs-5">{{rupiah($hasil->kelas_penerbangan[0]->harga)}}</p>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-end align-items-center">
                            <img src="/images/next.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</body>
</html>
