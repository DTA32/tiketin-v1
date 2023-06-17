<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-header></x-header>
    {{-- <p>{{dd($pemesanan)}}</p> --}}
    <div class="container" style="overflow-x: hidden; overflow-y:scroll; height:36rem">
        @foreach($pemesanan as $p)
            @php
                $id = $p->id;
            @endphp
            <a href="{{route('history.detail', $id)}}" style="text-decoration: none; color: black">
                <div class="search-box" style="margin-top: 2px; margin-bottom: 4px; padding-top:8px; padding-bottom:16px; border: 1px solid #868686;">
                    <div class="d-flex justify-content-between">
                        <p class="text-center">Booking ID: {{$p->id}}</p>
                        <p>Rp. {{$p->pemesanan_harga->total}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="text-center" style="font-size: 18px">{{$p->penerbangan->bandara_asal->kota}} - {{$p->penerbangan->bandara_tujuan->kota}}</p>
                        <p></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="text-center mb-0" style="font-size: 14px">{{$p->penerbangan->waktu_berangkat->format('D, d M')}} | {{$p->pemesanan_harga->kuantitas}} pax |
                            {{($p->kelas_penerbangan_id == 1) ? 'Ekonomi' : (($p->kelas_penerbangan_id == 2) ? 'Bisnis' : 'First')}}</p>
                            @if ($p->status == 0)
                            <p class="text-center mb-0 px-4" style="background: indianred; border-radius: 12px;">Gagal</p>
                            @elseif ($p->status == 1)
                            <p class="text-center mb-0 px-4" style="background: #A8FF9A; border-radius: 12px;">Berhasil</p>
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
