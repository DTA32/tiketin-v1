<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-header></x-header>
    <div class="border border-secondary-subtle py-4 mt-1 mb-2 bg-info">
        <div class="d-flex justify-content-center align-items-center">
            <img src="{{url('images/ic_baseline-person.png')}}" alt="" class="border border-secondary-subtle rounded-circle bg-secondary p-2" style="width: 96px; height: 96px">
        </div>
        <p class="fs-3 text-center mb-0 mt-3">Username</p>
    </div>
    <div class="border border-secondary-subtle py-2 mt-1 mb-4 px-3 bg-white" style="cursor: pointer">
        <img src="{{url('images/ic_baseline-person.png')}}" alt="">
        <span class="ps-2">Account Settings</span>
    </div>
    <div class="border border-secondary-subtle py-2 mt-1 px-3 bg-danger" style="cursor: pointer; margin-bottom: 240px">
        <img src="{{url('images/mdi_logout.png')}}" alt="" style="height: 24px; width: 24px">
        <span class="ps-2">Logout</span>
    </div>
    <x-footer></x-footer>
</body>
</html>
