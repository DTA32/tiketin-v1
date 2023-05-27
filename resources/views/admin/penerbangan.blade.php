<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
<div>
    <p>Halo, Admin!</p>
    <p><strong>Daftar penerbangan</strong></p>
    @foreach ( $penerbangan as $flight )
    <div>
        <p>ID: {{ $flight->id }}</p>
        <p>ASAL: {{ $flight->bandara_asal_id }}</p>
        <p>TUJUAN: {{ $flight->bandara_tujuan_id }}</p>
        <p>BERANGKAT: {{ $flight->waktu_berangkat }}</p>
        <p>SAMPAI: {{ $flight->waktu_sampai }}</p>
        <p>MASKAPAI: {{ $flight->maskapai }}</p>
        <p>TIPE: {{ $flight->tipe_pesawat }}</p>
    </div>
    @endforeach
</div>
<div>
    <form method="POST" action="{{route('admin.penerbangan.add')}}">
        @csrf
        <div>
            <label for="bandara_asal_id">Bandara asal id</label>
            <input type="text" name="bandara_asal_id" id="bandara_asal_id">
        </div>
        <div>
            <label for="bandara_tujuan_id">Bandara tujuan id</label>
            <input type="text" name="bandara_tujuan_id" id="bandara_tujuan_id">
        </div>
        <div>
            <label for="waktu_berangkat">Waktu berangkat</label>
            <input type="datetime-local" name="waktu_berangkat" id="waktu_berangkat">
        </div>
        <div>
            <label for="waktu_sampai">Waktu sampai</label>
            <input type="datetime-local" name="waktu_sampai" id="waktu_sampai">
        </div>
        <div>
            <label for="maskapai">Maskapai</label>
            <input type="text" name="maskapai" id="maskapai">
        </div>
        <div>
            <label for="tipe_pesawat">Tipe pesawat</label>
            <input type="text" name="tipe_pesawat" id="tipe_pesawat">
        </div>
        <div>
            <button type="submit">Tambah</button>
        </div>
    </form>
</div>
</body>
</html>
