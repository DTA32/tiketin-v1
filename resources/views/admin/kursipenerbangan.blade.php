<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
<div>
    <p>Halo, Admin!</p>
    <p><strong>Daftar kursi penerbangan</strong></p>
    @foreach ( $kursi_penerbangan as $seat )
    <div>
        <p>ID: {{ $seat->id }}</p>
        <p>ID KELAS: {{ $seat->kelas_id }}</p>
        <p>NO KURSI: {{ $seat->nomor_kursi }}</p>
        <p>STATUS: {{ $seat->status_kursi }}</p>
        <p>PENERBANGAN ID: {{ $seat->penerbangan_id }}</p>
    @endforeach
</div>
<div>
    <form method="POST" action="{{route('admin.kursipenerbangan.add')}}">
        @csrf
        <div>
            <label for="kelas_id">ID Kelas</label>
            <input type="text" name="kelas_id" id="kelas_id">
        </div>
        <div>
            <label for="nomor_kursi">No kursi</label>
            <input type="text" name="nomor_kursi" id="nomor_kursi">
        </div>
        <div>
            <label for="status_kursi">Status</label>
            <input type="text" name="status_kursi" id="status_kursi">
        </div>
        <div>
            <label for="penerbangan_id">Penerbangan id</label>
            <input type="text" name="penerbangan_id" id="penerbangan_id">
        </div>
        <div>
            <button type="submit">Tambah</button>
    </form>
</div>
</body>
</html>
