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
            <button type="button" class="btn btn-dark bg-primary-subtle" data-bs-toggle="modal" data-bs-target="#tambahKelas">
                Tambah
            </button>
            <p class="text-success">{{ Session::pull('success') }}</p>
            <p class="text-danger">{{ Session::pull('error') }}</p>
        </div>
        <div class="my-3">
            <p class="mb-1 fw-bold">Daftar Kelas</p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tipe Kelas</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Sisa Kursi</th>
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
                            <th scope="row" id="kelas{{$kelas->id}}Id">{{$kelas->id}}</th>
                            <td id="kelas{{$kelas->id}}Tipe">{{($kelas->tipe_kelas == 1) ? 'Ekonomi' : (($kelas->tipe_kelas == 2) ? 'Bisnis' : (($kelas->tipe_kelas == 3) ? 'First' : 'Error/Unlisted'))}}</td>
                            <td id="kelas{{$kelas->id}}Harga">{{$kelas->harga}}</td>
                            <td id="kelas{{$kelas->id}}Kursi">{{$kelas->jumlah_kursi}}</td>
                            <td>
                                <button class="btn bg-primary-subtle text-decoration-none py-0 btn-detail" data-kelas-id="{{$kelas->id}}" data-penerbangan-id="{{$id}}" data-bs-toggle="modal" data-bs-target="#lihatSeat">Lihat</button>
                            </td>
                            <td>
                                <button type="button" class="btn bg-warning-subtle text-decoration-none py-0" data-bs-toggle="modal" data-bs-target="#editKelas"
                                data-kelas-id="{{$kelas->id}}">
                                    Edit
                                </button>
                            </td>
                            <td>
                                <form action="{{route('admin.kelaspenerbangan.delete', ['id' => $id, 'id_kelas' => $kelas->id])}}" method="POST">
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
        {{-- Modal Tambah Kelas --}}
        <div class="modal fade" id="tambahKelas" tabindex="-1" aria-labelledby="tambahKelasLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="mb-1 fw-bold">Tambah Kelas Penerbangan</p>
                    </div>
                    <form method="POST" action="{{route('admin.kelaspenerbangan.add', $id)}}">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="penerbangan_id" class="form-label">ID Penerbangan</label>
                                <input type="text" name="penerbangan_id" id="penerbangan_id" value="{{$id}}" readonly class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="tipe_kelas" class="form-label">Tipe Kelas</label>
                                <select name="tipe_kelas" id="tipe_kelas" class="form-control">
                                    <option value="1">Ekonomi</option>
                                    <option value="2">Bisnis</option>
                                    <option value="3">First</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" name="harga" id="harga" class="form-control">
                            </div>
                            <div class="mb-3">
                                <p class="text-center">Mulai sekarang, jumlah kursi dan seat layout akan otomatis diisikan sistem bergantung kepada tipe pesawat dan tipe kelasnya</p>
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
        {{-- Modal Seat Layout Viewer --}}
        <div class="modal fade" id="lihatSeat" tabindex="-1" aria-labelledby="lihatSeatLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="mb-1 fw-bold">Seat Layout</p>
                    </div>
                    <div class="modal-body">
                        <div id="seatLayoutViewer" class="px-4">
                            {{-- JS in action --}}
                        </div>
                        <p class="mb-3">Legenda</p>
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col d-flex align-items-center">
                                    <div class="border border-black bg-light" style="display:inline-block; height:24px; width:24px"></div>
                                    <span class="ps-2">Kursi tersedia</span>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <div class="border border-black bg-secondary" style="display:inline-block; height:24px; width:24px"></div>
                                    <span class="ps-2" style="font-size: 15px">Kursi tidak tersedia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-secondary-subtle" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal Edit --}}
        <div class="modal fade" id="editKelas" tabindex="-1" aria-labelledby="editKelasLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="mb-1 fw-bold">Edit Kelas Penerbangan</p>
                    </div>
                    <form method="POST" action="{{route('admin.kelaspenerbangan.update', ['id' => $id])}}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3 d-none">
                                <label for="edit_id_kelas_penerbangan" class="form-label">ID Kelas Penerbangan</label>
                                <input type="text" name="edit_id_kelas_penerbangan" id="edit_id_kelas_penerbangan" readonly class="form-control">
                            </div>
                            <div class="mb-3 d-none">
                                <label for="edit_penerbangan_id" class="form-label">ID Penerbangan</label>
                                <input type="text" name="edit_penerbangan_id" id="edit_penerbangan_id" value="{{$id}}" readonly class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="edit_tipe_kelas" class="form-label">Tipe Kelas</label>
                                <select name="edit_tipe_kelas" id="edit_tipe_kelas" class="form-control">
                                    <option value="1">Ekonomi</option>
                                    <option value="2">Bisnis</option>
                                    <option value="3">First</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="edit_harga" class="form-label">Harga</label>
                                <input type="text" name="edit_harga" id="edit_harga" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="edit_jumlah_kursi" class="form-label">Jumlah kursi</label>
                                <input type="text" name="edit_jumlah_kursi" id="edit_jumlah_kursi" class="form-control">
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
        const editKelas = document.getElementById('editKelas');
        if(editKelas){
            editKelas.addEventListener('show.bs.modal', function(event){
                var button = event.relatedTarget;
                var id_kelas = button.getAttribute('data-kelas-id');
                var tipe_kelasText = document.getElementById('kelas'+id_kelas+'Tipe').innerHTML;
                if(tipe_kelasText == 'Ekonomi'){
                    var tipe_kelas = 1;
                }else if(tipe_kelasText == 'Bisnis'){
                    var tipe_kelas = 2;
                }else if(tipe_kelasText == 'First'){
                    var tipe_kelas = 3;
                }else{
                    var tipe_kelas = 0;
                }
                var harga = document.getElementById('kelas'+id_kelas+'Harga').innerHTML;
                var jumlah_kursi = document.getElementById('kelas'+id_kelas+'Kursi').innerHTML;
                var modal = this;
                modal.querySelector('.modal-body #edit_id_kelas_penerbangan').value = id_kelas;
                modal.querySelector('.modal-body #edit_tipe_kelas').value = tipe_kelas;
                modal.querySelector('.modal-body #edit_harga').value = harga;
                modal.querySelector('.modal-body #edit_jumlah_kursi').value = jumlah_kursi;
            });
        }
        $(document).ready(function(){
            $('.btn-detail').click(function(){
                var id_kelas = $(this).data('kelas-id');
                var id_penerbangan = $(this).data('penerbangan-id');
                $.ajax({
                    url: '/admin/penerbangan/' + id_penerbangan + '/kelas/' + id_kelas + '/seatlayout',
                    method: "GET",
                    dataType: 'json',
                    success: function(data){
                        var seatLayoutContainer = $('#seatLayoutViewer');
                        var seatLayout = JSON.parse(data);

                        seatLayoutContainer.empty();

                        if(seatLayout == 0){
                            seatLayoutContainer.html('<p class="text-center">Tidak ada data kursi</p>');
                        }else{
                            // Iterate over each row
                            seatLayout.rows.forEach(function(row) {
                                var seatRow = $('<div class="seat-row row mb-3"></div>');

                                // Iterate over each seat in the row
                                row.seats.forEach(function(seat, i) {
                                    var seatElement = $('<span class="seat col text-center"></span>');

                                    var seatNumber = $('<span class="seat-number text-center"></span>');
                                    seatNumber.text(seat.seat_number);

                                    // Apply styles based on seat availability
                                    if (seat.available) {
                                        seatNumber.addClass('border border-black bg-light text-black');
                                        seatNumber.css({
                                            'display': 'inline-block',
                                            'height': '30px',
                                            'width': '30px',
                                    });
                                    } else {
                                        seatNumber.addClass('border border-black text-white bg-secondary');
                                        seatNumber.css({
                                            'display': 'inline-block',
                                            'height': '30px',
                                            'width': '30px',
                                        });
                                    }

                                    // Add seat number and availability data attributes
                                    seatNumber.attr('data-seatnumber', seat.seat_number);
                                    seatNumber.attr('data-available', seat.available);

                                    seatElement.append(seatNumber);
                                    seatRow.append(seatElement);

                                    // Add row number if it is the specified column on the aisle
                                    if (i+1 === seatLayout.max_columns_on_aisle) {
                                        var rowNumber = $('<span class="row-number col text-center"></span>');
                                        rowNumber.text(row.row_number);
                                        seatRow.append(rowNumber);
                                    }
                                });

                                seatLayoutContainer.append(seatRow);
                            });
                        }

                        // Show the modal
                        $('#lihatSeat').modal('show');
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
