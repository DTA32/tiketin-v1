<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-headerBack></x-headerBack>
    <div class="search-box mt-1 py-3">
        <p class="text-center fw-bold fs-5">Account Settings</p>
        <div class="container">
            <div class="mb-3 row">
                <label for="nama" class="col">Nama Lengkap:</label>
                <input type="text" name="nama" id="nama" class="col-7 input-text px-0 me-2" autocomplete="off" style="border-bottom: 1px solid #000000;">
            </div>
            <div class="mb-3 row">
                <label for="email" class="col">Email:</label>
                <input type="text" name="email" id="email" class="col-7 input-text px-0 me-2" autocomplete="off" style="border-bottom: 1px solid #000000;">
            </div>
            <div class="mb-3 row">
                <label for="password" class="col">Password:</label>
                <input type="text" name="password" id="password" class="col-7 input-text px-0 me-2" autocomplete="off" style="border-bottom: 1px solid #000000;">
            </div>
            <div class="mb-4 row">
                <label for="conf_password" class="col">Konfirmasi Password:</label>
                <input type="text" name="conf_password" id="conf_password" class="col-7 input-text px-0 me-2" autocomplete="off" style="border-bottom: 1px solid #000000;">
            </div>
        </div>
            <div class="text-center">
            <button type="submit" class="button my-4" style="width: 240px;">
                Update
            </button>
        </div>
    </div>
</body>
</html>
