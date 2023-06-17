<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-header></x-header>
    {{-- <p>{{dd($pemesanan)}}</p> --}}
    <div class="container overflow-x-hidden overflow-y-scroll" style="height:36rem">
        @foreach($pemesanan as $p)
            <a class="text-black text-decoration-none" href="{{route('history.detail', $p->id)}}">
                <div class="border border-secondary-subtle my-1 pt-2 pb-3 px-3 bg-white">
                    <div class="d-flex justify-content-between">
                        <p class="text-center">Booking ID: {{$p->id}}</p>
                        <p>Rp. {{$p->pemesanan_harga->total}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="text-center fs-5">{{$p->penerbangan->bandara_asal->kota}} - {{$p->penerbangan->bandara_tujuan->kota}}</p>
                        <p></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="text-center mb-0" style="font-size: 14px">{{$p->penerbangan->waktu_berangkat->format('D, d M')}} | {{$p->pemesanan_harga->kuantitas}} pax |
                            {{($p->kelas_penerbangan_id == 1) ? 'Ekonomi' : (($p->kelas_penerbangan_id == 2) ? 'Bisnis' : 'First')}}</p>
                            @if ($p->status)
                                <p class="text-center mb-0 px-4 bg-success text-light rounded-pill">Berhasil</p>
                            @else
                                <p class="text-center mb-0 px-4 bg-danger text-light rounded-pill">Gagal</p>
                            @endif
                        </div>
                    </div>
                </a>
        <script>
        </script>
        @endforeach
    </div>
    <x-footer></x-footer>
</body>
</html>
