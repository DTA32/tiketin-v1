<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html data-bs-theme="dark">
@include('includes.headAdmin')
<body>
    <x-navbarAdmin></x-navbarAdmin>
    <div class="px-4">
        <a href="{{route('admin.penerbangan')}}" class="btn bg-primary-subtle my-2"><</a>
        <p class="text-center fw-bold fs-5 my-2">Kelas Penerbangan {{$id}}</p>
        <div class="my-3">
            <p class="mb-1 fw-bold">Daftar Kelas</p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tipe Kelas</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah Kursi</th>
                        <th scope="col">Seat Layout</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($kelas_penerbangan) == 0)
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada kelas penerbangan</td>
                        </tr>
                    @else
                        @foreach($kelas_penerbangan as $kelas)
                        <tr>
                            <th scope="row">{{$kelas->id}}</th>
                            <td>{{($kelas->tipe_kelas == 1) ? 'Ekonomi' : (($kelas->tipe_kelas == 2) ? 'Bisnis' : (($kelas->tipe_kelas == 3) ? 'First' : 'Error/Unlisted'))}}</td>
                            <td>{{$kelas->harga}}</td>
                            <td>{{$kelas->jumlah_kursi}}</td>
                            <td>'Lihat'</td>
                            <td>
                                <button type="button" class="btn bg-warning-subtle text-decoration-none py-0" data-bs-toggle="modal" data-bs-target="#editKelas"
                                data-kelas-id="{{$kelas->id}}">
                                    Edit
                                </button>
                            </td>
                            <td>
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn bg-danger-subtle text-decoration-none py-0">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
<div>
    <form method="POST" action="{{route('admin.kelaspenerbangan.add', $id)}}">
        @csrf
        <div>
            <label for="penerbangan_id">ID Penerbangan</label>
            <input type="text" name="penerbangan_id" id="penerbangan_id" value="{{$id}}" readonly>
        </div>
        <div>
            <label for="tipe_kelas">Tipe Kelas</label>
            <select name="tipe_kelas" id="tipe_kelas">
                <option value="1">Ekonomi</option>
                <option value="2">Bisnis</option>
                <option value="3">First</option>
            </select>
        </div>
        <div>
            <label for="harga">Harga</label>
            <input type="text" name="harga" id="harga">
        </div>
        <div>
            <label for="jumlah_kursi">Jumlah kursi</label>
            <input type="text" name="jumlah_kursi" id="jumlah_kursi">
        </div>
        <div>
            <label for="seat_layout">Seat layout</label>
            <input type="text" name="seat_layout" id="seat_layout">
        </div>
        <div>
            <button type="submit">Tambah</button>
    </form>
</div>
</body>
</html>
