<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <div class="container">
        <p>History</p>
        <div>
        @foreach($pemesanan as $p)
            <p>Booking ID: {{$p->id}}</p>
            @if ($p->status == 0)
                <p>Status: Belum dibayar</p>
            @elseif ($p->status == 1)
                <p>Status: Sudah dibayar</p>
            @endif
            @php
                $id = $p->id;
            @endphp
            <form method="POST" action="{{route('history.detail', $id)}}">
                @csrf
                <button type="submit">Lihat Detail</button>
            </form>
        @endforeach
        </div>
    </div>
</body>
</html>
