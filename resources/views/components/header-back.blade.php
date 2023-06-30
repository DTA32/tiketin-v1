<div class="header-container container text-center">
    <div class="row justify-content-center align-items-center w-100 h-100 mx-0">
        <div class="col-3">
            <a {{--href="{{url()->previous()}}"--}} onclick="window.history.back()" style="cursor: pointer"><img src="{{url('images/mdi_arrow-left.png')}}" alt=""></a>
        </div>
        <div class="col-6">
            <a href="{{route('home')}}" class=""><img src="{{url('/images/logo.png')}}" alt="logo" class="logo"></a>
        </div>
        <div class="col"></div>
    </div>
</div>
