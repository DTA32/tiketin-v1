<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body style="background: url('{{url('images/login_bg.png')}}') no-repeat center">
<div class="d-flex flex-column justify-content-center align-items-center min-vh-100">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <img src="{{url('images/logo_ori.png')}}" alt="" class="text-center mb-3" style="height: 100px">
        <h4 class="text-center mb-0 text-white mb-1">Welcome to</h4>
        <h2 class="text-center mb-0 text-white mb-3">TIKETIN</h2>
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center my-1 pt-4 pb-3 px-4" style="background: rgba(255, 255, 255, 0.75); border: 1px solid #C1C1C1; border-radius: 8px;">
        <div class="w-100 mb-5">
            <div class="container text-center">
                <div class="row justify-content-center align-items-center w-100 h-100 mx-0">
                    <div class="col-2 px-0">
                        <a href="{{url()->previous()}}"><img src="{{url('images/mdi_arrow-left.png')}}" alt=""></a>
                    </div>
                    <div class="col-8 px-0">
                        <p class="fw-bold fs-5 mb-0 text-center">REGISTER</p>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
        <form method="POST" action="{{route('register')}}">
            @csrf
            <div class="mb-5">
                <div class="mb-2" style="width: 240px">
                    <label for="name">Nama Lengkap</label>
                    <div class="input-text-div px-0 w-100">
                        <img src="{{url('/images/ic_baseline-person.png')}}" alt="">
                        <input type="text" name="name" id="name" class="input-text" autocomplete="off" style="width: 200px; background: transparent" required>
                    </div>
                </div>
                <div class="mb-2" style="width: 240px">
                    <label for="email">Email</label>
                    <div class="input-text-div px-0 w-100">
                        <img src="{{url('/images/ic_baseline-email.png')}}" alt="">
                        <input type="text" name="email" id="email" class="input-text" autocomplete="off" style="width: 200px; background: transparent" required>
                    </div>
                </div>
                <div class="mb-2" style="width: 240px">
                    <label for="password">Password</label>
                    <div class="input-text-div px-0 w-100">
                        <img src="{{url('/images/ic_baseline-key.png')}}" alt="">
                        <input type="password" name="password" id="password" class="input-text" autocomplete="off" style="width: 200px; background: transparent" required>
                    </div>
                </div>
                <div class="mb-4" style="width: 240px">
                    <label for="conf_password">Konfirmasi Password</label>
                    <div class="input-text-div px-0 w-100">
                        <img src="{{url('/images/ic_baseline-key.png')}}" alt="">
                        <input type="password" name="conf_password" id="conf_password" class="input-text" autocomplete="off" style="width: 200px; background: transparent" required>
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="button mb-4" style="width: 240px;">
                    Register
                </button>
            </div>
        </form>
        <p class="text-center text-danger">{{ Session::pull('error') }}</p>
    </div>
</div>
</body>
</html>
