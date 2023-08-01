<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-headerBack></x-headerBack>
    <div class="search-box mt-1 py-3">
        <p class="text-center fw-bold fs-5">Profile</p>
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
            <p class="text-center text-success">{{ Session::pull('success') }}</p>
            <p class="text-center text-danger">{{ Session::pull('error') }}</p>
        </form>
    </div>
    <button class="text-black text-decoration-none d-inline p-0 border-0 w-100" data-bs-toggle="modal" data-bs-target="#changePwd">
        <div class="d-flex border border-secondary-subtle py-2 px-3 bg-white ">
            <span class="d-flex align-items-center"><img src="{{url('images/ic_baseline-key.png')}}" alt="" style="height: 24px; width: 24px"></span>
            <span class="d-flex ps-2 flex-grow-1 align-items-center">Change Password</span>
            <span class="ms-2 text-secondary fs-5" style="display: inline-block;transform: scale(1.5,1)">&#10093;</span>
        </div>
    </button>
    {{-- Modal Change Password --}}
    <div class="modal fade" id="changePwd" tabindex="-1" aria-labelledby="changePwdLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="mb-1 fw-bold">Change Password</p>
                </div>
                <form method="POST" action="{{route('profile.updatepassword')}}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="old_password" class="form-label">Current Password</label>
                            <input type="password" name="old_password" id="old_password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" name="new_password" id="new_password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Reenter New Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control">
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
</body>
</html>
