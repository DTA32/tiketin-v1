<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tiketin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/step1.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/theme.min.css" integrity="sha512-hbs/7O+vqWZS49DulqH1n2lVtu63t3c3MTAn0oYMINS5aT8eIAbJGDXgLt6IxDHcWyzVTgf9XyzZ9iWyVQ7mCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>
<body>
    {{-- header --}}
    <div class="header-container container text-center">
        <div class="row justify-content-center align-items-center w-100 h-100 mx-0">
            <div class="col-3">
                <a href="{{url()->previous()}}" class=""><img src="{{url('images/mdi_arrow-left.png')}}" alt=""></a>
            </div>
            <div class="col-6 px-0">
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
        <div class="container row mt-1 py-1 mx-0 border border-secondary-subtle bg-white">
            <div class="col border-end border-secondary-subtle d-flex justify-content-center align-items-center" id="filterButton" style="cursor: pointer">
                <img src="{{url('images/mdi_filter.png')}}" alt="" width="24px" height="24px">
                <p class="ps-2 fs-5 mb-0">Filter</p>
            </div>
            <div class="col d-flex justify-content-center align-items-center" id="sortButton" style="cursor: pointer">
                <img src="{{url('images/mdi_sort.png')}}" alt="" width="24px" height="24px">
                <p class="ps-2 text-center fs-5 mb-0">Sort</p>
            </div>
        </div>
        <div class="bg-white p-2" style="display: none" id="sortMenu">
            <h5>Sort</h5>
            <div class="mb-2 p-2" id="sortRadioGroup">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sortRadio" id="sort1" value="1">
                    <label class="form-check-label" for="sort1">Harga terendah</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sortRadio" id="sort2" value="2">
                    <label class="form-check-label" for="sort2">Durasi tercepat</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sortRadio" id="sort3" value="3">
                    <label class="form-check-label" for="sort3">Keberangkatan paling awal</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sortRadio" id="sort4" value="4">
                    <label class="form-check-label" for="sort4">Kedatangan paling awal</label>
                </div>
            </div>
            <button class="btn btn-dark me-1" id="sortSubmit">Apply</button>
            <button class="btn btn-outline-secondary" id="sortReset">Reset</button>
        </div>
        <div class="bg-white p-2" style="display: none" id="filterMenu">
            <h5>Filter</h5>
            <div class="mb-2">
                <div>
                    <div class="d-flex border border-secondary-subtle px-2 py-1 bg-white" id="maskapaiFilterButton" style="cursor: pointer">
                        <span class="d-flex flex-grow-1 align-items-center">Maskapai</span>
                        <span class="ms-2 text-secondary fs-5" style="display: inline-block;transform: scale(1.5,1)">&#10093;</span>
                    </div>
                    <div class="mb-2 border border-secondary-subtle p-2" id="maskapaiCheckGroup" style="display: none">
                    </div>
                </div>
                <div>
                    <div class="d-flex border border-secondary-subtle px-2 py-1 bg-white" id="keberangkatanFilterButton" style="cursor: pointer">
                        <span class="d-flex flex-grow-1 align-items-center">Waktu Keberangkatan</span>
                        <span class="ms-2 text-secondary fs-5" style="display: inline-block;transform: scale(1.5,1)">&#10093;</span>
                    </div>
                    <div class="mb-2 border border-secondary-subtle p-2" id="keberangkatanCheckGroup" style="display: none">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="kebFilterCheck" id="keb1" value="0,559">
                            <label class="form-check-label" for="keb1">00:00 - 05:59 (Malam - Pagi)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="kebFilterCheck" id="keb2" value="600,1159">
                            <label class="form-check-label" for="keb2">06:00 - 11:59 (Pagi - Siang)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="kebFilterCheck" id="keb3" value="1200,1759">
                            <label class="form-check-label" for="keb3">12:00 - 17:59 (Siang - Sore)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="kebFilterCheck" id="keb4" value="1800,2359">
                            <label class="form-check-label" for="keb4">18:00 - 23:59 (Sore - Malam)</label>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="d-flex border border-secondary-subtle px-2 py-1 bg-white" style="cursor: pointer" id="durasiFilterButton">
                        <span class="d-flex flex-grow-1 align-items-center">Durasi</span>
                        <span class="ms-2 text-secondary fs-5" style="display: inline-block;transform: scale(1.5,1)">&#10093;</span>
                    </div>
                    <div class="mb-2 border border-secondary-subtle p-2" id="durasiRangeGroup" style="display: none">
                        <div id="durasiSlider" class="mt-2 mx-2"></div>
                        <p id="durasiRange" class="text-center my-2"></p>
                    </div>
                </div>
                <div>
                    <div class="d-flex border border-secondary-subtle px-2 py-1 bg-white" style="cursor: pointer" id="hargaFilterButton">
                        <span class="d-flex flex-grow-1 align-items-center">Harga</span>
                        <span class="ms-2 text-secondary fs-5" style="display: inline-block;transform: scale(1.5,1)">&#10093;</span>
                    </div>
                    <div class="mb-2 border border-secondary-subtle p-2" id="hargaRangeGroup" style="display: none">
                        <div id="hargaSlider" class="mt-2 mx-2"></div>
                        <p id="hargaRange" class="text-center my-2"></p>
                    </div>
                </div>
            </div>
            <button class="btn btn-dark me-1" id="filterSubmit">Apply</button>
            <button class="btn btn-outline-secondary" id="filterReset">Reset</button>
        </div>
        <p class="text-success text-center mt-1 mb-0" id="statusText" style="display: none"></p>
        <div class="mt-2 overflow-y-auto scrollbar" id="cardGroup">
            @foreach($results as $iter=>$hasil)
            <a class="text-black text-decoration-none" href="{{route('step2', ['penerbangan_id' => $hasil->id, 'penumpang' => $penumpang, 'kelas' => $kelas])}}" id="{{'card_'.$iter}}">
                <div class="border border-secondary-subtle my-1 pt-2 pb-3 px-3 bg-white">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p class="fs-5" id="{{$iter."_maskapai"}}">{{$hasil->maskapai}}</p>
                                <div class="row text-center">
                                    <p class="col mb-0" id="{{$iter."_keberangkatan"}}" data-value="{{date('Hi', strtotime($hasil->waktu_berangkat))}}">{{date('H:i', strtotime($hasil->waktu_berangkat))}}</p>
                                    @php
                                        $time1 = new DateTime($hasil->waktu_berangkat);
                                        $time2 = new DateTime($hasil->waktu_sampai);
                                        $interval = $time1->diff($time2);
                                        $interval_minute = $interval->format('%i') + ($interval->format('%h') * 60);
                                    @endphp
                                    <p class="col mb-0 d-flex justify-content-center align-items-end" style="font-size: 12px" id="{{$iter."_durasi"}}" data-value="{{$interval_minute}}">{{$interval->format('%hj %im')}}</p>
                                    <p class="fs-6 col mb-0" id="{{$iter."_kedatangan"}}" data-value="{{date('Hi', strtotime($hasil->waktu_sampai))}}">{{date('H:i', strtotime($hasil->waktu_sampai))}}</p>
                                </div>
                                <div class="row text-center">
                                    <p class="fs-6 col" style="font-size: 14px">{{$hasil->bandara_asal->kode_bandara}}</p>
                                    <img src="{{url('images/mdi_arrow-right-thin.png')}}" alt="" class="col" style="width: 54px; height:24px">
                                    <p class="fs-6 col" style="font-size: 14px">{{$hasil->bandara_tujuan->kode_bandara}}</p>
                                </div>
                                <div class="row">
                                    <p class="fs-5" id="{{$iter."_harga"}}" data-value="{{$hasil->kelas_penerbangan[0]->harga}}">{{rupiah($hasil->kelas_penerbangan[0]->harga)}}</p>
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
    </div>
</body>
</html>
