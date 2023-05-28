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
    <form method="POST" action="{{route('step4')}}">
        @csrf
        <input type="hidden" name="penerbangan_id" value="{{$penerbangan->id}}">
        <input type="hidden" name="penumpang" value="{{$penumpang}}">
        <input type="hidden" name="kelas" value="{{$kelas}}">
        @for ($i = 1; $i <= $penumpang; $i++)
            <div>
                <p>Penumpang {{$i}}</p>
                <label for="nama_lengkap[]">Nama Lengkap</label>
                <input type="text" name="nama_lengkap[]" id="nama_lengkap[]">
            </div>
        @endfor
        <div>
            <button type="submit">Lanjut</button>
        </div>
    </form>
</body>
</html>
