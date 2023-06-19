<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<style>
    .labl > input{
        display: none;
        visibility: hidden;
        /* position: absolute; */
    }
    .labl > div{
        cursor: pointer;
    }
    .labl > input:checked + div  {
        background-color: #ECECEC;
    }
</style>
<body>
    <x-headerBack></x-headerBack>
    <div class="bg-white">
        @csrf
        <label for="kartu" class="labl" style="width:100%">
            <input type="radio" id="kartu" name="metode_pembayaran" value="1">
            <div class="border border-secondary-subtle my-0 py-2 px-3">
                Kartu Kredit/Debit
            </div>
        </label>
        <label for="va" class="labl" style="width: 100%">
            <input type="radio" id="va" name="metode_pembayaran" value="2">
            <div class="border border-secondary-subtle my-0 py-2 px-3">
                Virtual Account
            </div>
        </label>
        <label for="qris" class="labl" style="width:100%">
            <input type="radio" id="qris" name="metode_pembayaran" value="3">
            <div class="border border-secondary-subtle my-0 py-2 px-3">
                QRIS
            </div>
        </label>
    </div>
</body>
</html>
