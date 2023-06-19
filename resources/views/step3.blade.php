<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-headerBack></x-headerBack>
    <div>
        <div class="progress mt-1" role="progressbar" aria-label="Progress" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-secondary" style="width:34%"></div>
        </div>
        <div class="d-flex justify-content-between">
            <span style="font-size: 10px"> </span>
            <span style="font-size: 10px">1</span>
            <span style="font-size: 10px">2</span>
            <span style="font-size: 10px">3</span>
            <span style="font-size: 10px">4</span>
            <span style="font-size: 10px">5</span>
            <span style="font-size: 10px"> </span>
        </div>
    </div>
    <div class="fs-5 text-center mt-2">
        <p class="mb-0">Pilih Kursi</p>
    </div>
    <form id="formm" method="POST" action="{{route('step4')}}">
        @csrf
        <input type="hidden" name="penerbangan_id" value="{{$penerbangan->id}}">
        <input type="hidden" name="kelas" value="{{$kelas}}">
        @foreach (Session::get('penumpang') as $key => $value)
            <input type="hidden" name="penumpang[]" id="hidden-{{$loop->iteration}}" value="{{ $loop->iteration }}|{{ Session::get('penumpang.'.$key.'.nama') }}|">
        @endforeach
    </form>
    <div class="border border-secondary-subtle my-0 px-2 bg-white d-flex justify-content-between align-items-center">
        <select name="pen_select" id="passenger-select" class="input-text form-select" style="width: 100%">
            @foreach (Session::get('penumpang') as $key => $value)
            <option id="select-{{$loop->iteration}}" value="{{$loop->iteration}}">
                Penumpang {{$loop->iteration}} - {{Session::get('penumpang.'.$key.'.nama')}} - Kursi {{Session::get('penumpang.'.$key.'.kursi_penerbangan')}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="border border-secondary-subtle my-1 pt-2 pb-5 px-3 bg-white">
        <p class="text-center fs-5 mb-4">{{$penerbangan->maskapai}} - {{$penerbangan->tipe_pesawat}} - {{($kelas_penerbangan->tipe_kelas == 1) ? 'Ekonomi' : (($kelas_penerbangan->tipe_kelas == 2) ? 'Bisnis' : 'First')}}</p>
        <div id="layout container">
            @php
                $seat_layout = json_decode($kelas_penerbangan->seat_layout, true);
            @endphp
            <div class="seat-layout px-4" id="seat-layout">
                @foreach ($seat_layout['rows'] as $row)
                    <div class="seat-row row mb-3">
                        @foreach ($row['seats'] as $seat)
                            <span class="seat col text-center">
                                <span class="seat-number text-center
                                @if ($seat['available'])
                                border border-black" style="display:inline-block; height:24px; width:30px; background-color: #FFFFFF;
                                @else
                                border border-black text-white" style="display:inline-block; height:30px; width:30px; background: #868686;
                                @endif
                                cursor:pointer" data-seatnumber="{{ $seat['seat_number'] }}" data-available="{{$seat['available']}}">{{ $seat['seat_number'] }}</span>
                            </span>
                            @if ($loop->iteration == $seat_layout['max_columns_on_aisle'])
                                <span class="row-number col text-center">{{ $row['row_number'] }}</span>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
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
                    <span class="ps-2" style="font-size: 15px">Kursi tidak tersedia</span>
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
    <div class="text-center mt-5 pb-3">
        <button type="submit" id="nextt" class="button text-center" style="width: 240px">Lanjutkan</button>
    </div>
    <script>
        document.getElementById("nextt").addEventListener("click", function() {
            document.getElementById("formm").submit();
        });

        // Assume you have an HTML element with the ID 'seat-layout' wrapping the seat layout display
        const seatLayout = document.getElementById('seat-layout');
        let selectedSeat = null; // Variable to store the currently selected seat

        // Event delegation to handle click on seat elements
        seatLayout.addEventListener('click', function(event) {
            const clickedElement = event.target;

            // Check if the clicked element is a seat element
            if (clickedElement.classList.contains('seat-number')) {
                // Get the selected passenger index from the dropdown
                const selectedPassengerIndex = document.getElementById('passenger-select').value;

                // Get the seat number and availability status from the data attributes
                const seatNumber = clickedElement.dataset.seatnumber;
                const isAvailable = clickedElement.dataset.available;
                // Perform further actions based on seat availability
                if (isAvailable) {
                    // Update the hidden input value for the selected passenger
                    const hiddenInput_name = document.getElementById('hidden-' + selectedPassengerIndex).value.split('|')[1];
                    document.getElementById('select-' + selectedPassengerIndex).innerHTML = 'Penumpang ' + selectedPassengerIndex + ' - ' + hiddenInput_name + ' - ' + 'Kursi ' + seatNumber;
                    document.getElementById('hidden-' + selectedPassengerIndex).value = selectedPassengerIndex + '|' + hiddenInput_name + '|' + seatNumber;

                    // Seat is available, select it
                    if (selectedSeat !== null) {
                        // Revert the background color of the previously selected seat
                        selectedSeat.style.backgroundColor = '';
                        selectedSeat.dataset.available = 1;
                    }

                    // Set the background color of the newly selected seat
                    clickedElement.style.backgroundColor = '#A8FF9A';
                    selectedSeat = clickedElement; // Update the selected seat variable

                    // Perform additional logic for seat selection, if needed
                }
            }
        });

        const passengerSelect = document.querySelector('select[name="pen_select"]');

        passengerSelect.addEventListener('change', function() {
            const selectedPassengerIndex = passengerSelect.value.split('|')[0];
            if(selectedSeat != null){
                selectedSeat.style.backgroundColor = '#868686';
                selectedSeat.style.color = '#FFFFFF';
                delete selectedSeat.dataset.available;
            }
            hasSelected = document.getElementById('hidden-' + selectedPassengerIndex).value.split('|')[2] ? true : false;
            if(hasSelected){
                selectedSeatNow = document.querySelector('span[data-seatnumber="' + document.getElementById('hidden-' + selectedPassengerIndex).value.split('|')[2] + '"]');
                selectedSeatNow.style.backgroundColor = '#A8FF9A';
                selectedSeatNow.style.color = '#000000';
                selectedSeatNow.dataset.available = 1;
                selectedSeat = selectedSeatNow;
            }
            else{
                selectedSeat = null;
            }
        });
    </script>
</body>
</html>
