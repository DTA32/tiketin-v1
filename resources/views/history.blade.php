<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-header></x-header>
    <div class="container" style="{{--overflow-x: hidden; overflow-y:scroll; height:36rem--}}">
        {{-- <p>History</p> --}}
        @foreach($pemesanan as $p)
            @php
                $id = $p->id;
            @endphp
            <div id="search-box-{{$id}}" class="search-box" style="margin-top: 2px; margin-bottom: 4px; padding-top:8px; padding-bottom:16px; border: 1px solid #868686; cursor: pointer;">
                <div class="d-flex justify-content-between"">
                    <p class="text-center">Booking ID: {{$p->id}}</p>
                    <p>Total</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="text-center">Asal - Tujuan</p>
                    <p></p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="text-center mb-0">Date | pax | Class</p>
                    @if ($p->status == 0)
                    <p class="text-center mb-0 px-2" style="background: lightgray; border-radius: 12px;">Belum dibayar</p>
                    @elseif ($p->status == 1)
                    <p class="text-center mb-0 px-4" style="background: #A8FF9A; border-radius: 12px;">Berhasil</p>
                    @endif
                </div>
                <form id="detail-form-{{$id}}" method="POST" action="{{route('history.detail', $id)}}" style="display: none;">
                    @csrf
                </form>
            </div>
        <script>
            document.getElementById("search-box-{{$id}}").addEventListener("click", function() {
                document.getElementById("detail-form-{{$id}}").submit();
            });
        </script>
        @endforeach
    </div>
    <x-footer></x-footer>
</body>
</html>
