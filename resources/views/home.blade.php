<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-header></x-header>
    <div class="container">
        <div class="greeting mb-2 pb-1">
            <p class="fs-6 lh-sm mb-0">Halo, User!</p>
            <p class="fs-5 fw-bold lh-sm mb-0">Mau kemana?</p>
        </div>
        <div class="search-box mb-3">
            <div class="form-box">
            <form method="GET" action="{{route('step1')}}">
                @csrf
                <div class="mb-2">
                    <label for="dari">Dari</label>
                    <br>
                    <div class="input-text-div">
                        <img src="{{url('/images/bxs_plane-take-off.png')}}" alt="">
                        <input type="text" name="dari" id="dari" class="input-text" style="width: 250px">
                    </div>
                </div>
                <div class="mb-2">
                    <label for="ke">Ke</label>
                    <br>
                    <div class="input-text-div">
                        <img src="{{url('/images/bxs_plane-land.png')}}" alt="">
                        <input type="text" name="ke" id="ke"  class="input-text" style="width: 250px">
                    </div>
                </div>
                <div class="mb-2">
                    <label for="tanggal">Tanggal Keberangkatan</label>
                    <br>
                    <input type="date" name="tanggal" id="tanggal" class="input-other">
                </div>
                <div class="container mb-3">
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
        {{-- belum jalan --}}
        @if (session('success'))
            <div>
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <div class="search-box mb-3 pb-3">
            <div class="fs-5 pt-2 mb-5">News</div>
            <p class="text-secondary text-center mb-5">No news yet...</p>
        </div>
    </div>
    <x-footer></x-footer>
</body>
</html>
