<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-header></x-header>
    <div class="container overflow-x-hidden overflow-y-scroll" style="max-height: 80vh">
        <div class="greeting mb-2 pb-1">
            <p class="fs-6 lh-sm mb-0">Halo, User!</p>
            <p class="fs-5 fw-bold lh-sm mb-0">Mau kemana?</p>
        </div>
        <div class="search-box mb-3">
            <div class="form-box container">
            <form method="GET" action="{{route('step1')}}">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-2 row">
                            <label for="dari">Dari</label>
                            <div class="input-text-div ms-2 px-0">
                                <img src="{{url('/images/bxs_plane-take-off.png')}}" alt="">
                                <input type="text" name="dari" id="dari" class="input-text" autocomplete="off" style="width: 250px">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="ke">Ke</label>
                            <div class="input-text-div ms-2 px-0">
                                <img src="{{url('/images/bxs_plane-land.png')}}" alt="">
                                <input type="text" name="ke" id="ke" class="input-text" autocomplete="off" style="width: 250px">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="tanggal">Tanggal Keberangkatan</label>
                            <input type="date" name="tanggal" id="tanggal" class="input-other ms-2 ps-1 pe-0">
                        </div>
                    </div>
                    <div class="col ms-3 mt-2 pt-4">
                        <a onclick="swapSearch()"><img src="{{url('images/reverse.png')}}" alt="" style="cursor: pointer"></a>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="penumpang">Penumpang</label>
                            <br>
                            <div class="input-text-div" style="width:150px">
                                <img src="{{url('/images/ic_baseline-person.png')}}" alt="">
                                <select name="penumpang" id="penumpang" class="input-text pe-0" style="width:122px">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label for="kelas">Kelas</label>
                            <br>
                            <div class="input-text-div" style="width: 150px">
                                <img src="{{url('/images/fluent-emoji-high-contrast_seat.png')}}" alt="">
                                <select name="kelas" id="kelas"  class="input-text ps-0" style="width:122px">
                                    <option value="1">Ekonomi</option>
                                    <option value="2">Bisnis</option>
                                    <option value="3">First</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="button" style="width: 350px;">
                        <img src="{{url('/images/mdi_magnify.png')}}" alt="">
                        Cari
                    </button>
                </div>
            </div>
            </form>
        </div>
        <p class="text-center text-success">{{ Session::pull('success') }}</p>
        <p class="text-center text-danger">{{ Session::pull('error') }}</p>
        <div class="search-box pb-3">
            <a class="d-inline-flex text-black text-decoration-none pt-2 my-2 w-100" href="{{route('news')}}">
                <div class="fs-5">
                    <span>News</span>
                    <span class="ms-2 text-secondary" style="display: inline-block;transform: scale(1.5,1)">&#10093;</span>
                </div>
            </a>
            <div class="overflow-x-scroll overflow-y-hidden" style="white-space: nowrap">
                @foreach ($news as $newsss)
                <div class="d-inline-block me-2">
                    <a class="text-decoration-none" href="{{route('news.detail', $newsss->id)}}">
                        <div class="card" style="width: 140px; white-space: normal">
                            <img src="{{Storage::url('app/public/'.$newsss->image)}}" class="card-img-top" alt="">
                            <div class="card-body p-2">
                                <p class="card-title fw-bold" style="font-size: 12px">{{$newsss->title}}</p>
                                <p class="card-text text-secondary" style="font-size: 10px">{{Str::limit($newsss->content, 80)}}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <x-footer></x-footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script>
        var path = "{{ route('typeahead') }}";
        $('#dari').typeahead({
            source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                    console.log(process(data));
                    return process(data);
                });
            }
        });
        $('#ke').typeahead({
            source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                    console.log(process(data));
                    return process(data);
                });
            }
        });
        function swapSearch(){
            var dari = document.getElementById('dari').value;
            var ke = document.getElementById('ke').value;
            document.getElementById('dari').value = ke;
            document.getElementById('ke').value = dari;
        };
    </script>
</body>
</html>
