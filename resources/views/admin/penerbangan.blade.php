<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html data-bs-theme="dark">
@include('includes.headAdmin')
<body>
    <x-navbarAdmin></x-navbarAdmin>
    <div class="px-4">
        <p class="text-center fw-bold fs-5 my-2">Penerbangan</p>
        <div class="my-3">
            <p class="mb-1 fw-bold">Tambah Penerbangan</p>
            <form method="POST" action="{{route('admin.penerbangan.add')}}">
                @csrf
                <div class="mb-3 w-25">
                    <label for="bandara_asal_id" class="form-label">Bandara asal</label>
                    <input type="text" name="bandara_asal_id" id="bandara_asal_id" class="form-control">
                </div>
                <div class="mb-3 w-25">
                    <label for="bandara_tujuan_id" class="form-label">Bandara tujuan</label>
                    <input type="text" name="bandara_tujuan_id" id="bandara_tujuan_id" class="form-control">
                </div>
                <div class="mb-3 w-25">
                    <label for="waktu_berangkat" class="form-label">Waktu berangkat</label>
                    <input type="datetime-local" name="waktu_berangkat" id="waktu_berangkat" class="form-control">
                </div>
                <div class="mb-3 w-25">
                    <label for="waktu_sampai" class="form-label">Waktu sampai</label>
                    <input type="datetime-local" name="waktu_sampai" id="waktu_sampai" class="form-control">
                </div>
                <div class="mb-3 w-25">
                    <label for="maskapai" class="form-label">Maskapai</label>
                    <input type="text" name="maskapai" id="maskapai" class="form-control">
                </div>
                <div class="mb-3 w-25" class="form-label">
                    <label for="tipe_pesawat">Tipe pesawat</label>
                    <input type="text" name="tipe_pesawat" id="tipe_pesawat" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn bg-primary-subtle">Tambah</button>
                </div>
            </form>
        </div>
        <div class="my-3">
            <p class="mb-1 fw-bold">Daftar penerbangan</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Asal</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Waktu Berangkat</th>
                        <th scope="col">Waktu Sampai</th>
                        <th scope="col">Maskapai</th>
                        <th scope="col">Tipe Pesawat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $penerbangan as $flight )
                        <tr>
                            <th scope="row">{{ $flight->id }}</th>
                            <td>{{ $flight->bandara_asal->kota.' ('.$flight->bandara_asal->kode_bandara.')' }}</td>
                            <td>{{ $flight->bandara_tujuan->kota.' ('.$flight->bandara_tujuan->kode_bandara.')' }}</td>
                            <td>{{ $flight->waktu_berangkat->format('H:i | D, d M Y') }}</td>
                            <td>{{ $flight->waktu_sampai->format('H:i | D, d M Y') }}</td>
                            <td>{{ $flight->maskapai }}</td>
                            <td>{{ $flight->tipe_pesawat }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
