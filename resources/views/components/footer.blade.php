<div class="footer-container container text-center">
    <div class="row d-flex justify-content-center align-items-center w-100 h-100 mx-0">
        <div class="col">
            <a href="{{route('home')}}" class="footer-button rounded-circle"
            @if (Route::currentRouteName() == 'home')
                style="background-color: #ECECEC"
            @endif
            >
            <img src="{{url('images/ic_outline-home.png')}}" alt=""></a>
        </div>
        <div class="col">
            <a href="{{route('history')}}" class="footer-button rounded-circle"
            @if (Route::currentRouteName() == 'history')
                style="background-color: #ECECEC"
            @endif
            >
            <img src="{{url('images/ic_outline-airplane-ticket.png')}}" alt=""></a>
        </div>
        <div class="col">
            <a href="{{route('settings')}}" class="footer-button rounded-circle"
            @if (Route::currentRouteName() == 'settings')
                style="background-color: #ECECEC"
            @endif
            >
            <img src="{{url('images/ic_outline-settings.png')}}" alt=""></a>
        </div>
    </div>
</div>
