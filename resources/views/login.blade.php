<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body style="background: url('{{url('images/login_bg.png')}}') no-repeat center">
<div class="d-flex flex-column justify-content-center align-items-center min-vh-100">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <img src="{{url('images/logo.png')}}" alt="" class="text-center mb-3" style="height: 100px; width:100px;">
        <h4 class="text-center mb-0 text-white mb-1">Welcome to</h4>
        <h2 class="text-center mb-0 text-white mb-3">TIKETIN</h2>
    </div>
    <div class="my-1 pt-4 pb-3 px-4" style="background: rgba(255, 255, 255, 0.75); border: 1px solid #C1C1C1; border-radius: 8px;">
        <div class="mb-4" style="width: 240px">
            <label for="email">Email</label>
            <div class="input-text-div px-0 w-100">
                <img src="{{url('/images/ic_baseline-email.png')}}" alt="">
                <input type="text" name="email" id="email" class="input-text" autocomplete="off" style="width: 200px; background: transparent">
            </div>
        </div>
        <div class="mb-4" style="width: 240px">
            <label for="password">Password</label>
            <div class="input-text-div px-0 w-100">
                <img src="{{url('/images/ic_baseline-key.png')}}" alt="">
                <input type="text" name="password" id="password" class="input-text" autocomplete="off" style="width: 200px; background: transparent">
            </div>
        </div>
        <button type="submit" onclick="{{route('home')}}" class="button mb-4" style="width: 240px;">
            Login
        </button>
        <p class="text-center mb-0">Doesn't have account?</p>
        <a href="{{route('register')}}" class="d-flex justify-content-center mb-5 pb-5 text-decoration-none text-black text-decoration-underline">Register</a>
    </div>
</div>
</body>
</html>
