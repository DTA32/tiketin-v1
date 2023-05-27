<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
<div>
    <p>Halo, Admin!</p>
    <p><strong>Daftar bandara</strong></p>
    @foreach ( $bandara as $airport )
    <div>
        <p>ID: {{ $airport->id }}</p>
        <p>NAMA: {{ $airport->nama_bandara }}</p>
        <p>KODE: {{ $airport->kode_bandara }}</p>
        <p>KOTA: {{ $airport->kota }}</p>
    @endforeach
</div>
<div>
    <form method="POST" action="{{route('admin.bandara.add')}}">
        @csrf
        <div>
            <label for="nama_bandara">Nama bandara</label>
            <input type="text" name="nama_bandara" id="nama_bandara">
        </div>
        <div>
            <label for="kode_bandara">Kode bandara</label>
            <input type="text" name="kode_bandara" id="kode_bandara">
        </div>
        <div>
            <label for="kota">Kota</label>
            <input type="text" name="kota" id="kota">
        </div>
        <div>
            <button type="submit">Tambah</button>
        </div>
    </form>
</div>
</body>
</html>
