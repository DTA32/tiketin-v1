<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tiketin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        * {
            font-family: "Roboto";
        }
    </style>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>

<body onload="window.print()">
<div>
    @if ($pemesanan == null) <p class="text-center text-danger mt-5 fw-bold fs-3">Data fetching error, please try again</p>
    @else
        <div style="padding: 4vh 3vw;" id="printArea">
            <div class="d-flex justify-content-between align-items-center my-3">
                <div class="d-inline-flex align-items-end">
                    <h2 class="mb-0">E-ticket</h2>
                    <small class="text-secondary">&nbsp;/ tiket elektronik</small>
                </div>
                <img src="{{url('/images/logo_ori.png')}}" alt="logo" height="96">
            </div>
            <div class="mt-5 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4>Detail penerbangan</h4>
                    <p class="mb-0 text-secondary">TIKETIN Booking ID: {{$pemesanan->id}}</p>
                </div>
                <div style="border: solid #9ca3af; border-width: 1px 1px 1px 4px;" class="row m-0 py-3">
                    <div class="col-4">
                        <div class="mb-3">
                            <img src="{{url('images/maskapai/' . str_replace(' ','_',strtolower($pemesanan->penerbangan->maskapai)) . '.png')}}" height="64px" class="my-2">
                            <p class="mb-0">{{$pemesanan->penerbangan->maskapai}}</p>
                            <p class="mb-0 text-secondary">{{($pemesanan->kelas_penerbangan->tipe_kelas == 1) ? 'Ekonomi' : (($pemesanan->kelas_penerbangan->tipe_kelas == 2) ? 'Bisnis' : 'First')}}</p>
                        </div>
                        <p class="mb-0">Kode Booking Maskapai (PNR)</p>
                        <h3>{{$pemesanan->booking_code}}</h3>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <small class="text-secondary">Berangkat</small>
                                <p class="fs-5 fw-bold mb-1">{{$pemesanan->penerbangan->waktu_berangkat->format('l, d F Y')}}</p>
                                <p class="mb-0">{{$pemesanan->penerbangan->bandara_asal->kota}}</p>
                                <p class="mb-0">{{$pemesanan->penerbangan->bandara_asal->nama_bandara}}</p>
                                <p>Pukul <span class="fw-bold">{{$pemesanan->penerbangan->waktu_berangkat->format('H:i')}}</span></p>
                            </div>
                            <div class="col">
                                <small class="text-secondary">Tiba</small>
                                <p class="fs-5 mb-1">{{$pemesanan->penerbangan->waktu_sampai->format('l, d F Y')}}</p>
                                <p class="mb-0">{{$pemesanan->penerbangan->bandara_tujuan->kota}}</p>
                                <p class="mb-0">{{$pemesanan->penerbangan->bandara_tujuan->nama_bandara}}</p>
                                <p>Pukul {{$pemesanan->penerbangan->waktu_sampai->format('H:i')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <p class="mb-0">Note:</p>
                <ul>
                    <li>Tunjukkan identitas para penumpang saat check-in</li>
                    <li>Lakukan check-in paling lambat 2 jam sebelum keberangkatan</li>
                    <li>Waktu yang tertera diatas adalah waktu bandara setempat</li>
                </ul>
            </div>
            <div class="mt-5">
                <h4>Detail penumpang</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nomor Kursi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pemesanan->pemesanan_penumpang as $penumpang)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$penumpang->nama}}</td>
                            <td>{{$penumpang->kursi_penerbangan}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
</body>
</html>
