<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html data-bs-theme="dark">
@include('includes.headAdmin')
<body>
    <x-navbarAdmin></x-navbarAdmin>
    <div class="px-4">
        <p class="text-center fw-bold fs-5 my-2">Pemesanan</p>
        <div class="my-3">
            <p class="mb-1 fw-bold">Daftar Pemesanan</p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Status</th>
                        <th scope="col">Metode Pembayaran</th>
                        <th scope="col">Referensi Pembayaran</th>
                        <th scope="col">Kelas Penerbangan</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $pemesanan as $order )
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ ($order->status == 0) ? 'Gagal' : (($order->status == 1) ? 'Berhasil' : 'Error/Unlisted') }}</td>
                        <td>
                            @if ($order->metode_pembayaran == 0)
                                <span class="text-secondary">Error</span>
                            @elseif ($order->metode_pembayaran == 1)
                                Kartu Kredit/Debit
                            @elseif ($order->metode_pembayaran == 2)
                                Virtual Account
                            @elseif ($order->metode_pembayaran == 3)
                                QRIS
                            @else
                                <span class="text-secondary">Unlisted</span>
                            @endif
                        </td>
                        <td>{{ $order->referensi_pembayaran }}</td>
                        <td>{{ ($order->kelas_penerbangan_id == 1) ? 'Ekonomi (err)' : (($order->kelas_penerbangan->tipe_kelas == 1) ? 'Ekonomi' : (($order->kelas_penerbangan->tipe_kelas == 2) ? 'Bisnis' : (($order->kelas_penerbangan->tipe_kelas == 3) ? 'First' : 'Error/Unlisted'))) }}</td>
                        <td>{{ $order->userId }}</td>
                        <td>
                            <button class="btn bg-primary-subtle text-decoration-none py-0 btn-detail" data-pemesanan-id="{{$order->id}}">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="pemesananDetailModal" tabindex="-1" aria-labelledby="pemesananDetailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pemesananDetailModalLabel">Detail Pemesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Content of pemesanan details will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.btn-detail').click(function() {
                var pemesananId = $(this).data('pemesanan-id');
                $.ajax({
                    url: '/admin/pemesanan/' + pemesananId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // Load Pemesanan
                        var html = '';
                        var responseData = response.pemesanan
                        html += '<p class="text-center fw-bold">Pemesanan</p>';
                        html += '<div class="row">';
                        html += '<div class="col-6">';
                        html += '<p class="mb-1 ">ID Pemesanan</p>';
                        html += '<p class="mb-1 ">ID Penerbangan</p>';
                        html += '<p class="mb-1 ">Tanggal Pemesanan</p>';
                        html += '<p class="mb-1 ">Status</p>';
                        html += '<p class="mb-1 ">Metode Pembayaran</p>';
                        html += '<p class="mb-1 ">Referensi Pembayaran</p>';
                        html += '<p class="mb-1 ">Kelas Penerbangan</p>';
                        html += '<p class="mb-1 ">User ID</p>';
                        html += '<p class="mb-1 ">Booking Code</p>';
                        html += '</div>';
                        html += '<div class="col-6">';
                        html += '<p class="mb-1">' + responseData.id + '</p>';
                        html += '<p class="mb-1">' + responseData.penerbangan_id + '</p>';
                        html += '<p class="mb-1">' + new Date(responseData.created_at).toLocaleString() + '</p>';
                        html += '<p class="mb-1">' + ((responseData.status == 0) ? 'Gagal' : ((responseData.status == 1) ? 'Berhasil' : 'Error/Unlisted')) + '</p>';
                        html += '<p class="mb-1">' + ((responseData.metode_pembayaran == 0) ? 'Error' : ((responseData.metode_pembayaran == 1) ? 'Kartu Kredit/Debit' : ((responseData.metode_pembayaran == 2) ? 'Virtual Account' : ((responseData.metode_pembayaran == 3) ? 'QRIS' : 'Unlisted')))) + '</p>';
                        html += '<p class="mb-1">' + responseData.referensi_pembayaran + '</p>';
                        html += '<p class="mb-1">' + ((responseData.kelas_penerbangan.tipe_kelas == 1) ? 'Ekonomi' : ((responseData.kelas_penerbangan_id == 2) ? 'Bisnis' : ((responseData.kelas_penerbangan_id == 3) ? 'First' : 'Error/Unlisted'))) + '</p>';
                        html += '<p class="mb-1">' + responseData.userId + '</p>';
                        html += '<p class="mb-1">' + responseData.booking_code + '</p>';
                        html += '</div>';
                        html += '</div>';
                        // Load Penerbangan
                        html += '<p class="text-center fw-bold mt-3">Penerbangan</p>';
                        html += '<div class="row">';
                        html += '<div class="col-6">';
                        html += '<p class="mb-1 ">ID Penerbangan</p>';
                        html += '<p class="mb-1 ">Bandara Asal</p>';
                        html += '<p class="mb-1 ">Bandara Tujuan</p>';
                        html += '<p class="mb-1 ">Waktu Keberangkatan</p>';
                        html += '<p class="mb-1 ">Waktu Kedatangan</p>';
                        html += '<p class="mb-1 ">Maskapai</p>';
                        html += '<p class="mb-1 ">Tipe Pesawat</p>';
                        html += '</div>';
                        html += '<div class="col-6">';
                        html += '<p class="mb-1">' + responseData.penerbangan.id + '</p>';
                        html += '<p class="mb-1">' + responseData.penerbangan.bandara_asal.kota + ' (' + responseData.penerbangan.bandara_asal.kode_bandara + ')' + '</p>';
                        html += '<p class="mb-1">' + responseData.penerbangan.bandara_tujuan.kota + ' (' + responseData.penerbangan.bandara_tujuan.kode_bandara + ')' + '</p>';
                        html += '<p class="mb-1">' + new Date(responseData.penerbangan.waktu_berangkat).toLocaleString() + '</p>';
                        html += '<p class="mb-1">' + new Date(responseData.penerbangan.waktu_sampai).toLocaleString() + '</p>';
                        html += '<p class="mb-1">' + responseData.penerbangan.maskapai + '</p>';
                        html += '<p class="mb-1">' + responseData.penerbangan.tipe_pesawat + '</p>';
                        html += '</div>';
                        html += '</div>';
                        // Load pemesanan_harga
                        html += '<p class="text-center fw-bold mt-3">Harga</p>';
                        if (responseData.pemesanan_harga == null) {
                            html += '<p class="text-center fw-bold">Tidak ada data</p>';
                        } else {
                            html += '<div class="row">';
                            html += '<div class="col-6">';
                            html += '<p class="mb-1">ID</p>';
                            html += '<p class="mb-1">Biaya Dasar</p>';
                            html += '<p class="mb-1">Kuantitas</p>';
                            html += '<p class="mb-1">Biaya Layanan</p>';
                            html += '<p class="mb-1">Total</p>';
                            html += '</div>';
                            html += '<div class="col-6">';
                            html += '<p class="mb-1">' + responseData.pemesanan_harga.id + '</p>';
                            html += '<p class="mb-1">' + responseData.pemesanan_harga.biaya_dasar + '</p>';
                            html += '<p class="mb-1">' + responseData.pemesanan_harga.kuantitas + '</p>';
                            html += '<p class="mb-1">' + responseData.pemesanan_harga.biaya_layanan + '</p>';
                            html += '<p class="mb-1">' + responseData.pemesanan_harga.total + '</p>';
                            html += '</div>';
                            html += '</div>';
                        }
                        // Load pemesanan_penumpang
                        html += '<p class="text-center fw-bold mt-3">Penumpang</p>';
                        if (responseData.pemesanan_penumpang.length == 0) {
                            html += '<p class="text-center fw-bold">Tidak ada data</p>';
                        } else {
                            responseData.pemesanan_penumpang.forEach(function(pemesananPenumpang, i) {
                                html += '<p class="mb-1 fw-bold">Penumpang ' + (i+1) + '</p>';
                                html += '<div class="row mb-2">';
                                html += '<div class="col-6">';
                                html += '<p class="mb-1 ">ID Database</p>';
                                html += '<p class="mb-1 ">Nama</p>';
                                html += '<p class="mb-1 ">Kursi Penerbangan</p>';
                                html += '</div>';
                                html += '<div class="col-6">';
                                html += '<p class="mb-1">' + pemesananPenumpang.id + '</p>';
                                html += '<p class="mb-1">' + pemesananPenumpang.nama + '</p>';
                                html += '<p class="mb-1">' + pemesananPenumpang.kursi_penerbangan + '</p>';
                                html += '</div>';
                                html += '</div>';
                            });
                        }
                        // Show the modal
                        $('.modal-body').html(html);
                        $('#pemesananDetailModal').modal('show');
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
