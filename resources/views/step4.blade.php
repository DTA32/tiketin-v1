<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <div>
        <p>Ringkasan Pemesanan</p>
    </div>
    <div>
        <p>Penerbangan</p>
        <div>
            <p>{{$penerbangan->maskapai}}</p>
            <p>ID: {{$penerbangan->id}}</p>
            <p>{{$penerbangan->tipe_pesawat}}</p>
                    @if($kelas == 1)
                        <p>Ekonomi</p>
                    @elseif($kelas == 2)
                        <p>Bisnis</p>
                    @elseif($kelas == 3)
                        <p>First</p>
                    @endif
        </div>
        <p>{{$penerbangan->waktu_berangkat->format('d/m/y')}}</p>
        <p>{{$penerbangan->waktu_berangkat->format('H:i')}}</p>
        <p>{{$penerbangan->waktu_sampai->format('H:i')}}</p>
        <p>{{searchPenerbanganFull($penerbangan->id)->kota_asal}}</p>
        <p>{{searchPenerbanganFull($penerbangan->id)->kota_tujuan}}</p>
    </div>
    <div>
        <p>Detail Penumpang</p>
        @for ($i = 0; $i < $jumlah_penumpang; $i++)
            <div>
                <p>Penumpang {{$i+1}}</p>
                <p>Nama Lengkap: {{$penumpang->nama}}</p>
                <p>No Kursi: {{$penumpang->kursi_penerbangan_id}}</p>
            </div>
        @endfor
    </div>
    <div>
        <p>Detail Harga</p>
        <p>{{$penerbangan->maskapai}} ({{$detail_harga->kuantitas}}) : {{$detail_harga->biaya_dasar}}</p>
        <p>Biaya Layanan : {{$detail_harga->biaya_layanan}}</p>
        <p>Total : {{$detail_harga->total}}</p>
    </div>
    <form method="POST" action="{{route('step5', ['penerbangan_id' => $penerbangan->id, 'penumpang' => $penumpang, 'kelas' => $kelas, 'harga' => $detail_harga])}}">
        @csrf
        <button type="submit">Lanjutkan</button>
    </form>
</body>
</html>
