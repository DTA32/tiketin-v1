<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html data-bs-theme="dark">
@include('includes.headAdmin')
<body>
    <x-navbarAdmin></x-navbarAdmin>
    <div class="px-4">
        <p class="text-center fw-bold fs-5 my-2">Bandara</p>
        <div class="my-3">
            <button type="button" class="btn bg-primary-subtle" data-bs-toggle="modal" data-bs-target="#tambahBandara">
                Tambah
            </button>
            <div class="modal fade" id="tambahBandara" tabindex="-1" aria-labelledby="tambahBandaraLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class="mb-1 fw-bold">Tambah Bandara</p>
                        </div>
                        <form method="POST" action="{{route('admin.bandara.add')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nama_bandara" class="form-label">Nama bandara</label>
                                    <input type="text" name="nama_bandara" id="nama_bandara" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="kode_bandara" class="form-label">Kode bandara</label>
                                    <input type="text" name="kode_bandara" id="kode_bandara" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="kota" class="form-label">Kota</label>
                                    <input type="text" name="kota" id="kota" class="form-control">
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
            <p class="mb-1 fw-bold">Daftar Bandara</p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Kota</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $bandara as $airport )
                    <tr>
                        <th scope="row">{{ $airport->id }}</th>
                        <td>{{ $airport->nama_bandara }}</td>
                        <td>{{ $airport->kode_bandara }}</td>
                        <td>{{ $airport->kota }}</td>
                        <td>
                            <button type="button" class="btn bg-warning-subtle text-decoration-none py-0" data-bs-toggle="modal" data-bs-target="#editBandara"
                            data-bs-id="{{$airport->id}}" data-bs-nama="{{$airport->nama_bandara}}" data-bs-kode="{{$airport->kode_bandara}}" data-bs-kota="{{$airport->kota}}">
                                Edit
                            </button>
                        </td>
                        <td>
                            <form action="{{route('admin.bandara.delete', $airport->id)}}" method="POST">
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
        {{-- Modal Edit --}}
        <div class="modal fade" id="editBandara" tabindex="-1" aria-labelledby="editBandaraLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="mb-1 fw-bold">Edit Bandara</p>
                    </div>
                    <form method="POST" action="{{route('admin.bandara.update')}}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="edit_id_bandara" class="form-label">ID bandara</label>
                                <input type="text" name="edit_id_bandara" id="edit_id_bandara" class="form-control-plaintext" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="edit_nama_bandara" class="form-label">Nama bandara</label>
                                <input type="text" name="edit_nama_bandara" id="edit_nama_bandara" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="kode_bandara" class="form-label">Kode bandara</label>
                                <input type="text" name="edit_kode_bandara" id="edit_kode_bandara" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="kota" class="form-label">Kota</label>
                                <input type="text" name="edit_kota" id="edit_kota" class="form-control">
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
        const editBandara = document.getElementById('editBandara')
        if(editBandara){
            editBandara.addEventListener('show.bs.modal', function (event) {
                // Button that triggered the modal
                var button = event.relatedTarget
                // Extract info from data-bs-* attributes
                var id = button.getAttribute('data-bs-id')
                var nama = button.getAttribute('data-bs-nama')
                var kode = button.getAttribute('data-bs-kode')
                var kota = button.getAttribute('data-bs-kota')
                // Update the modal's content.
                var idBandara = editBandara.querySelector('.modal-body #edit_id_bandara')
                var namaBandara = editBandara.querySelector('.modal-body #edit_nama_bandara')
                var kodeBandara = editBandara.querySelector('.modal-body #edit_kode_bandara')
                var kotaBandara = editBandara.querySelector('.modal-body #edit_kota')
                idBandara.value = id
                namaBandara.value = nama
                kodeBandara.value = kode
                kotaBandara.value = kota
            })
        }
    </script>
</body>
</html>
