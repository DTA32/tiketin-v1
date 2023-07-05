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
            <button type="button" class="btn bg-primary-subtle" data-bs-toggle="modal" data-bs-target="#tambahPenerbangan">
                Tambah
            </button>
            <div class="modal fade" id="tambahPenerbangan" tabindex="-1" aria-labelledby="tambahPenerbanganLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class="mb-1 fw-bold">Tambah Penerbangan</p>
                        </div>
                        <form method="POST" action="{{route('admin.penerbangan.add')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="bandara_asal_id" class="form-label">Bandara asal</label>
                                    <select name="bandara_asal_id" id="bandara_asal_id" class="form-select">
                                        @foreach ($bandara as $item)
                                            <option value="{{$item->id}}">{{$item->nama_bandara}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="bandara_tujuan_id" class="form-label">Bandara tujuan</label>
                                    <select name="bandara_tujuan_id" id="bandara_tujuan_id" class="form-select">
                                        @foreach ($bandara as $item)
                                            <option value="{{$item->id}}">{{$item->nama_bandara}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="waktu_berangkat" class="form-label">Waktu berangkat</label>
                                    <input type="datetime-local" name="waktu_berangkat" id="waktu_berangkat" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="waktu_sampai" class="form-label">Waktu sampai</label>
                                    <input type="datetime-local" name="waktu_sampai" id="waktu_sampai" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="maskapai" class="form-label">Maskapai</label>
                                    <select name="maskapai" id="maskapai" class="form-select">
                                        <option value="Air Asia">Air Asia</option>
                                        <option value="Batik Air">Batik Air</option>
                                        <option value="Citilink">Citilink</option>
                                        <option value="Garuda Indonesia">Garuda Indonesia</option>
                                        <option value="Lion Air">Lion Air</option>
                                        <option value="Sriwijaya Air">Sriwijaya Air</option>
                                        <option value="Wings Air">Wings Air</option>
                                    </select>
                                </div>
                                <div class="mb-3" class="form-label">
                                    <label for="tipe_pesawat">Tipe pesawat</label>
                                    <select name="tipe_pesawat" id="tipe_pesawat" class="form-select">
                                        <option value="Airbus A320">Airbus A320</option>
                                        <option value="Airbus A330">Airbus A330</option>
                                        <option value="Airbus A380">Airbus A380</option>
                                        <option value="ATR 72">ATR 72</option>
                                        <option value="Boeing 707">Boeing 707</option>
                                        <option value="Boeing 737">Boeing 737</option>
                                        <option value="Boeing 747">Boeing 747</option>
                                        <option value="Boeing 777">Boeing 777</option>
                                        <option value="Boeing 787">Boeing 787</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-secondary-subtle" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn bg-primary-subtle">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <p class="text-success">{{ Session::pull('success') }}</p>
            <p class="text-danger">{{ Session::pull('error') }}</p>
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
                        <th scope="col">Kelas</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
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
                            <td>
                                <a href="{{route('admin.kelaspenerbangan.get', $flight->id)}}" class="btn bg-info-subtle text-decoration-none py-0">Lihat</a>
                            </td>
                            <td>
                                <button type="button" class="btn bg-warning-subtle text-decoration-none py-0 btn-edit" data-bs-toggle="modal" data-bs-target="#editPenerbangan"
                                data-penerbangan-id="{{$flight->id}}">
                                    Edit
                                </button>
                            </td>
                            <td>
                                <form action="{{route('admin.penerbangan.delete', $flight->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn bg-danger-subtle text-decoration-none py-0">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="editPenerbangan" tabindex="-1" aria-labelledby="editPenerbanganLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="mb-1 fw-bold">Edit Penerbangan</p>
                    </div>
                    <form method="POST" action="{{route('admin.penerbangan.update')}}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="edit_id" class="form-label">ID</label>
                                <input type="text" class="form-control" id="edit_id" name="edit_id" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="edit_bandara_asal_id" class="form-label">Bandara asal</label>
                                <select name="edit_bandara_asal_id" id="edit_bandara_asal_id" class="form-select">
                                    @foreach ($bandara as $item)
                                        <option value="{{$item->id}}">{{$item->nama_bandara}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="edit_bandara_tujuan_id" class="form-label">Bandara tujuan</label>
                                <select name="edit_bandara_tujuan_id" id="edit_bandara_tujuan_id" class="form-select">
                                    @foreach ($bandara as $item)
                                        <option value="{{$item->id}}">{{$item->nama_bandara}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="edit_waktu_berangkat" class="form-label">Waktu berangkat</label>
                                <input type="datetime-local" name="edit_waktu_berangkat" id="edit_waktu_berangkat" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="edit_waktu_sampai" class="form-label">Waktu sampai</label>
                                <input type="datetime-local" name="edit_waktu_sampai" id="edit_waktu_sampai" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="edit_maskapai" class="form-label">Maskapai</label>
                                <select name="edit_maskapai" id="edit_maskapai" class="form-select">
                                    <option value="Air Asia">Air Asia</option>
                                    <option value="Batik Air">Batik Air</option>
                                    <option value="Citilink">Citilink</option>
                                    <option value="Garuda Indonesia">Garuda Indonesia</option>
                                    <option value="Lion Air">Lion Air</option>
                                    <option value="Sriwijaya Air">Sriwijaya Air</option>
                                    <option value="Wings Air">Wings Air</option>
                                </select>
                            </div>
                            <div class="mb-3" class="form-label">
                                <label for="edit_tipe_pesawat">Tipe pesawat</label>
                                <select name="edit_tipe_pesawat" id="edit_tipe_pesawat" class="form-select">
                                    <option value="Airbus A320">Airbus A320</option>
                                    <option value="Airbus A330">Airbus A330</option>
                                    <option value="Airbus A380">Airbus A380</option>
                                    <option value="ATR 72">ATR 72</option>
                                    <option value="Boeing 707">Boeing 707</option>
                                    <option value="Boeing 737">Boeing 737</option>
                                    <option value="Boeing 747">Boeing 747</option>
                                    <option value="Boeing 777">Boeing 777</option>
                                    <option value="Boeing 787">Boeing 787</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-secondary-subtle" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn bg-primary-subtle">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready( function () {
            $('.btn-edit').click(function(){
                var id = $(this).data('penerbangan-id');
                $.ajax({
                    url: '/admin/penerbangan/' + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(response){
                        var data = response.penerbangan;
                        $('#edit_id').val(data.id);
                        $('#edit_bandara_asal_id').val(data.bandara_asal_id);
                        $('#edit_bandara_tujuan_id').val(data.bandara_tujuan_id);
                        var waktu_berangkatUTC = new Date(data.waktu_berangkat);
                        var waktu_berangkatLocal = new Date(waktu_berangkatUTC.getTime() - waktu_berangkatUTC.getTimezoneOffset() * 60000);
                        var waktu_berangkat = waktu_berangkatLocal.toISOString().slice(0, 16);
                        $('#edit_waktu_berangkat').val(waktu_berangkat);
                        var waktu_sampaiUTC = new Date(data.waktu_sampai);
                        var waktu_sampaiLocal = new Date(waktu_sampaiUTC.getTime() - waktu_sampaiUTC.getTimezoneOffset() * 60000);
                        var waktu_sampai = waktu_sampaiLocal.toISOString().slice(0, 16);
                        $('#edit_waktu_sampai').val(waktu_sampai);
                        $('#edit_maskapai').val(data.maskapai);
                        $('#edit_tipe_pesawat').val(data.tipe_pesawat);
                    }
                });
            });
        } );
    </script>
</body>
</html>
