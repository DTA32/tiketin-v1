<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-headerBack></x-headerBack>
    <div class="search-box mt-1 py-3">
        <p class="text-center fw-bold fs-5">Account Settings</p>
        <form method="POST" action="{{route('profile.update')}}">
            @csrf
            @method('PUT')
            <div class="container">
                <div class="mb-3 row">
                    <label for="nama" class="col">Nama Lengkap:</label>
                    <input type="text" name="name" id="name" class="col-7 input-text px-0 me-2" autocomplete="off" style="border-bottom: 1px solid #000000;" value="{{$name}}">
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col">Email:</label>
                    <input type="text" name="email" id="email" class="col-7 input-text px-0 me-2" autocomplete="off" style="border-bottom: 1px solid #000000;" value="{{$email}}">
                </div>
                <div class="mb-4 row">
                    <label for="password" class="col">Current Password:</label>
                    <input type="password" name="password" id="password" class="col-7 input-text px-0 me-2" autocomplete="off" style="border-bottom: 1px solid #000000;">
                </div>
            </div>
                <div class="text-center">
                <button type="submit" class="button my-4" style="width: 240px;">
                    Update
                </button>
            </div>
            <p class="text-center text-danger">{{ Session::pull('error') }}</p>
        </form>
    </div>
</body>
</html>
