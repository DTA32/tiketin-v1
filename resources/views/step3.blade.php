<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-headerBack></x-headerBack>
    <div class="fs-5 text-center mt-2">
        <p class="mb-0">Pilih Kursi</p>
    </div>
    <form id="formm" method="POST" action="{{route('step4')}}">
        @csrf
        <input type="hidden" name="penerbangan_id" value="{{$penerbangan->id}}">
        <input type="hidden" name="kelas" value="{{$kelas}}">
        @foreach (Session::get('penumpang') as $key => $value)
            <input type="hidden" name="penumpang[]" id="hidden-{{$loop->iteration}}" value="{{ $loop->iteration }}|{{ Session::get('penumpang.'.$key.'.nama') }}|step3logic">
        @endforeach
    </form>
    <div class="border border-secondary-subtle my-0 px-2 bg-white d-flex justify-content-between align-items-center">
        <select name="pen_select" class="input-text form-select" style="width: 100%">
            @foreach (Session::get('penumpang') as $key => $value)
            {{-- <option value="1">
                Penumpang 1 - Nama Lengkap - Kursi
            </option> --}}
            <option id="select-{{$loop->iteration}}" value="{{$loop->iteration}}|{{Session::get('penumpang.'.$key.'.nama')}}|{{Session::get('penumpang.'.$key.'.kursi_penerbangan')}}">
                Penumpang {{$loop->iteration}} - {{Session::get('penumpang.'.$key.'.nama')}} - Kursi {{Session::get('penumpang.'.$key.'.kursi_penerbangan')}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="border border-secondary-subtle my-1 pt-2 pb-5 px-3 bg-white">
        <p class="text-center fs-5">Pesawat - Tipe - Kelas</p>
        <div id="layout"></div>
    </div>
    <div class="border border-secondary-subtle my-2 pt-3 pb-4 px-3 bg-white">
        <p class="mb-3">Legenda</p>
        <div class="container">
            <div class="row mb-2">
                <div class="col d-flex align-items-center">
                    <div class="border border-black bg-white" style="display:inline-block; height:24px; width:24px"></div>
                    <span class="ps-2">Kursi tersedia</span>
                </div>
                <div class="col d-flex align-items-center">
                    <div class="border border-black" style="display:inline-block; height:24px; width:24px; background: #868686"></div>
                    <span class="ps-2" style="font-size: 15px">Kursi sudah dipesan</span>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col d-flex align-items-center">
                    <div class="border border-black" style="display:inline-block; height:24px; width:24px; background: #A8FF9A"></div>
                    <span class="ps-2">Kursi yang dipilih</span>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-5">
        <button type="submit" id="nextt" class="button text-center" style="width: 240px">Lanjutkan</button>
    </div>
    <script>
        document.getElementById("nextt").addEventListener("click", function() {
            document.getElementById("formm").submit();
        });
    </script>
</body>
</html>
