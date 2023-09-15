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
                    <div class="d-flex border border-secondary-subtle px-2 py-1 bg-white" style="cursor: pointer">
                        <span class="d-flex flex-grow-1 align-items-center">Durasi</span>
                        <span class="ms-2 text-secondary fs-5" style="display: inline-block;transform: scale(1.5,1)">&#10093;</span>
                    </div>
                    <div class="mb-2 border border-secondary-subtle p-2" id="durasiRange" style="display: none">
                    </div>
                </div>
                <div>
                    <div class="d-flex border border-secondary-subtle px-2 py-1 bg-white" style="cursor: pointer">
                        <span class="d-flex flex-grow-1 align-items-center">Harga</span>
                        <span class="ms-2 text-secondary fs-5" style="display: inline-block;transform: scale(1.5,1)">&#10093;</span>
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
    <script>
        $(document).ready(function(){
            const dataCount = $("#cardGroup").children().length;
            var maskapaiArray = [];
            for(let i = 0; i < dataCount; i++){
                const maskapai = $("#"+i+"_maskapai").text();
                if(!maskapaiArray.includes(maskapai)){
                    maskapaiArray.push(maskapai);
                    $("#maskapaiCheckGroup").append("<div class='form-check'><input class='form-check-input' type='checkbox' value='"+maskapai+"' id='maskapaiCheck_"+i+"'><label class='form-check-label' for='maskapaiCheck_"+i+"'>"+maskapai+"</label></div>")
                }
            }
            // function
            // sort
            $("#sortButton").click(function(){
                $("#filterMenu").hide();
                $("#sortMenu").slideToggle();
            })
            $("#sortSubmit").click(function(){
                const sortValue = $("input[name='sortRadio']:checked").val();
                const dataCount = $("#cardGroup").children().length;
                resetOrder();
                if(sortValue == 1){
                    for(let i = 0; i < dataCount; i++){
                        for(let j = 0; j < dataCount; j++){
                            const harga1 = parseInt($("#"+j+"_harga").data('value'));
                            const harga2 = parseInt($("#"+(j+1)+"_harga").data('value'));
                            if(harga1 > harga2){
                                $("#card_"+j).before($("#card_"+(j+1)));

                            }
                        }
                    }
                }
                else if(sortValue == 2){
                    for(let i = 0; i < dataCount; i++){
                        for(let j = 0; j < dataCount; j++){
                            const durasi1 = parseInt($("#"+j+"_durasi").data('value'));
                            const durasi2 = parseInt($("#"+(j+1)+"_durasi").data('value'));
                            if(durasi1 > durasi2){
                                $("#card_"+j).before($("#card_"+(j+1)));
                            }

                        }
                    }
                }
                else if(sortValue == 3){
                    for(let i = 0; i < dataCount; i++){
                        for(let j = 0; j < dataCount; j++){
                            const keberangkatan1 = parseInt($("#"+j+"_keberangkatan").data('value'));
                            const keberangkatan2 = parseInt($("#"+(j+1)+"_keberangkatan").data('value'));
                            if(keberangkatan1 > keberangkatan2){
                                $("#card_"+j).before($("#card_"+(j+1)));
                            }
                        }
                    }
                }
                else if(sortValue == 4){
                    for(let i = 0; i < dataCount; i++){
                        for(let j = 0; j < dataCount; j++){
                            const kedatangan1 = parseInt($("#"+j+"_kedatangan").data('value'));
                            const kedatangan2 = parseInt($("#"+(j+1)+"_kedatangan").data('value'));
                            if(kedatangan1 > kedatangan2){
                                $("#card_"+j).before($("#card_"+(j+1)));
                            }
                        }
                    }
                }
                sortSuccess();
            })
            $("#sortReset").click(function(){
                resetOrder();
                $('input[name="sortRadio"]').prop('checked', false);
            })
            function resetOrder() {
                for(let i = 0; i < $("#cardGroup").children().length; i++){
                    $("#cardGroup").append($("#card_"+i));
                }
            }
            function sortSuccess(){
                $("#statusText").text("Sorted successfully");
                $("#statusText").show();
                setTimeout(function(){
                    $("#statusText").hide();
                }, 2000);
            }
            // filter
            $("#filterButton").click(function(){
                $("#sortMenu").hide();
                $("#filterMenu").slideToggle();
            })
            $("#maskapaiFilterButton").click(function(){
                $("#maskapaiCheckGroup").slideToggle();
            })
            $("#keberangkatanFilterButton").click(function(){
                $("#keberangkatanCheckGroup").slideToggle();
            })
            $("#filterSubmit").click(function(){
                const maskapaiFilter = [];
                const keberangkatanFilter = [];
                for(let i = 0; i < maskapaiArray.length; i++){
                    if($("#maskapaiCheck_"+i).is(":checked")){
                        maskapaiFilter.push($("#maskapaiCheck_"+i).val());
                    }
                }
                for(let i = 1; i <= 4; i++){
                    if($("#keb"+i).is(":checked")){
                        const range = $("#keb"+i).val().split(",");
                        keberangkatanFilter.push(range);
                    }
                }
                if(keberangkatanFilter.length == 0 && maskapaiFilter.length == 0){
                    $("#filterReset").trigger("click");
                }
                else{
                    for(let i = 0; i < dataCount; i++){
                        const maskapai = $("#"+i+"_maskapai").text();
                        const keberangkatan = parseInt($("#"+i+"_keberangkatan").data('value'));
                        // if(maskapaiFilter.length > 0){
                        //     if(!maskapaiFilter.includes(maskapai)){
                        //         $("#card_"+i).hide();
                        //     }
                        //     else{
                        //         $("#card_"+i).show();
                        //     }
                        // }
                        // if(keberangkatanFilter.length > 0){
                        //     for(let j = 0; j < keberangkatanFilter.length; j++){
                        //         if(keberangkatan >= keberangkatanFilter[j][0] && keberangkatan <= keberangkatanFilter[j][1]){
                        //             $("#card_"+i).show();
                        //             break;
                        //         }
                        //         else{
                        //             $("#card_"+i).hide();
                        //         }
                        //     }
                        // }
                        const maskapaiFilterCondition = maskapaiFilter.length > 0 ? maskapaiFilter.includes(maskapai) : true;
                        const keberangkatanFilterCondition = keberangkatanFilter.length > 0 ? keberangkatanFilter.some(range => keberangkatan >= range[0] && keberangkatan <= range[1]) : true;
                        if(maskapaiFilterCondition && keberangkatanFilterCondition){
                            $("#card_"+i).show();
                        }
                        else{
                            $("#card_"+i).hide();
                        }
                    }
                }
                filterSuccess();
            })
            $("#filterReset").click(function(){
                for(let i = 0; i < maskapaiArray.length; i++){
                    $("#maskapaiCheck_"+i).prop('checked', false);
                }
                for(let i = 0; i < 4; i++){
                    $("#keberangkatanCheck_"+i).prop('checked', false);
                }
                for(let i = 0; i < dataCount; i++){
                    $("#card_"+i).show();
                }
            })
            function filterSuccess(){
                $("#statusText").text("Filtered successfully");
                $("#statusText").show();
                setTimeout(function(){
                    $("#statusText").hide();
                }, 2000);
            }
        })
    </script>
</body>
</html>
