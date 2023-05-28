<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <div>
        <p>Hasil</p>
        @foreach($results as $hasil)
        <div>
            <form method="GET" action="{{route('step2', ['penerbangan_id' => $hasil->id, 'penumpang' => $penumpang, 'kelas' => $kelas])}}">
            <input type="hidden" name="penerbangan_id" value="{{$hasil->id}}">
            <input type="hidden" name="penumpang" value="{{$penumpang}}">
            <input type="hidden" name="kelas" value="{{$kelas}}">
            <p>{{$hasil->id}}</p>
            <p>{{$hasil->waktu_berangkat}}</p>
            <p>{{$hasil->waktu_sampai}}</p>
            <p>{{$hasil->kota_asal}}</p>
            <p>{{$hasil->kota_tujuan}}</p>
            <p>{{$hasil->maskapai}}</p>
            <p>{{$hasil->tipe_pesawat}}</p>
            <p>{{$hasil->tipe_kelas}}</p>
            <p>{{$hasil->harga}}</p>
            <p>{{$penumpang}}</p>
            <button type="submit">Pilih</button>
        </div>
        @endforeach
    </div>
</body>
</html>
