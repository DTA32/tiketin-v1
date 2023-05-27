<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <div>
    <p>Penerbangan</p>
    <p>{{$penerbangan->maskapai}}</p>
    <p>{{$penerbangan->waktu_berangkat->format('d/m/y')}}</p>
    <p>{{$penerbangan->waktu_berangkat->format('H:i')}}</p>
    <p>{{$penerbangan->waktu_sampai->format('H:i')}}</p>
    </div>
    <p>Detail Penumpang</p>
    <form method="POST" action="">
        @for ($i = 1; $i <= $penumpang; $i++)
            <div>
                <p>Penumpang {{$i}}</p>
                <label for="nama_{{$i}}">Nama Penumpang {{$i}}</label>
                <input type="text" name="nama_depan_{{$i}}" id="nama_depan_{{$i}}">
                <input type="text" name="nama_belakang_{{$i}}" id="nama_belakang_{{$i}}">
            </div>
        @endfor
        <div>
            <button type="submit">Lanjut</button>
        </div>
    </form>
</body>
</html>
