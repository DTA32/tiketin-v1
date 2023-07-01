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
    <div class="mt-1 mb-4">
        <a class="text-black text-decoration-none" href="{{route('profile')}}">
            <div class="d-flex border border-secondary-subtle py-2 px-3 bg-white">
                <span class="d-flex align-items-center"><img src="{{url('images/ic_baseline-person.png')}}" alt="" style="height: 24px; width: 24px"></span>
                <span class="d-flex ps-2 flex-grow-1 align-items-center">Account Settings</span>
                <span class="ms-2 text-secondary fs-5" style="display: inline-block;transform: scale(1.5,1)">&#10093;</span>
            </div>
        </a>
        <a class="text-black text-decoration-none" href="{{route('under_construction')}}">
            <div class="d-flex border border-secondary-subtle py-2 px-3 bg-white">
                <span class="d-flex align-items-center"><img src="{{url('images/mdi_customer-service.png')}}" alt="" style="height: 24px; width: 24px"></span>
                <span class="d-flex ps-2 flex-grow-1 align-items-center">Customer Service</span>
                <span class="ms-2 text-secondary fs-5" style="display: inline-block;transform: scale(1.5,1)">&#10093;</span>
            </div>
        </a>
        <a class="text-black text-decoration-none" href="{{route('settings.about')}}">
            <div class="d-flex border border-secondary-subtle py-2 px-3 bg-white">
                <span class="d-flex align-items-center"><img src="{{url('images/mdi_about.png')}}" alt="" style="height: 24px; width: 24px"></span>
                <span class="d-flex ps-2 flex-grow-1 align-items-center">About</span>
                <span class="ms-2 text-secondary fs-5" style="display: inline-block;transform: scale(1.5,1)">&#10093;</span>
            </div>
        </a>
    </div>
    <a class="text-black text-decoration-none" href="{{route('logout')}}">
        <div class="d-flex border border-secondary-subtle py-2 mt-1 px-3 bg-danger-subtle" style="cursor: pointer; margin-bottom: 240px">
            <span class="d-flex align-items-center"><img src="{{url('images/mdi_logout.png')}}" alt="" style="height: 24px; width: 24px" class="d-flex align-items-center"></span>
            <span class="d-flex ps-2 flex-grow-1 align-items-center">Logout</span>
            <span class="ms-2 text-secondary fs-5" style="display: inline-block;transform: scale(1.5,1)">&#10093;</span>
        </div>
    </a>
    <x-footer></x-footer>
</body>
</html>
