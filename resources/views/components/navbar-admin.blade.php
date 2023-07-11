<nav class="navbar navbar-expand-lg bg-primary-subtle">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('admin')}}">
            <img src="{{url('images/Logo.png')}}" alt="" width="30" height="24" class="d-inline-block align-text-top">
            <span class="ms-2">Admin</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="d-flex navbar-nav">
                <a class="text-decoration-none" href="{{route('admin')}}">
                    <div class="d-flex rounded py-2 px-3 mx-2 my-1 btn btn-outline-primary">
                        <span class="d-flex align-items-center"><img src="{{url('images/ic_outline-home.png')}}" alt="" style="height: 24px; width: 24px" class="navitem-logo"></span>
                        <span class="d-flex ps-2 flex-grow-1 align-items-center text-white">Home</span>
                    </div>
                </a>
                <a class="text-decoration-none" href="{{route('admin.bandara')}}">
                    <div class="d-flex rounded py-2 px-3 mx-2 my-1 btn btn-outline-primary">
                        <span class="d-flex align-items-center"><img src="{{url('images/bxs_plane-take-off.png')}}" alt="" style="height: 24px; width: 24px" class="navitem-logo"></span>
                        <span class="d-flex ps-2 flex-grow-1 align-items-center text-white">Bandara</span>
                    </div>
                </a>
                <a class="text-decoration-none text-white" href="{{route('admin.penerbangan')}}">
                    <div class="d-flex rounded py-2 px-3 mx-2 my-1 btn btn-outline-primary">
                        <span class="d-flex align-items-center"><img src="{{url('images/bxs_plane-land.png')}}" alt="" style="height: 24px; width: 24px" class="navitem-logo"></span>
                        <span class="d-flex ps-2 flex-grow-1 align-items-center text-white">Penerbangan</span>
                    </div>
                </a>
                <a class="text-decoration-none text-white" href="{{route('admin.pemesanan')}}">
                    <div class="d-flex rounded py-2 px-3 mx-2 my-1 btn btn-outline-primary">
                        <span class="d-flex align-items-center"><img src="{{url('images/ic_outline-airplane-ticket.png')}}" alt="" style="height: 24px; width: 24px" class="navitem-logo"></span>
                        <span class="d-flex ps-2 flex-grow-1 align-items-center text-white">Pemesanan</span>
                    </div>
                </a>
                <a class="text-decoration-none text-white" href="{{route('admin.news')}}">
                    <div class="d-flex rounded py-2 px-3 mx-2 my-1 btn btn-outline-primary">
                        <span class="d-flex align-items-center"><img src="{{url('images/ic_baseline-local-printshop.png')}}" alt="" style="height: 24px; width: 24px" class="navitem-logo"></span>
                        <span class="d-flex ps-2 flex-grow-1 align-items-center text-white">News</span>
                    </div>
                </a>
                <a class="text-decoration-none text-white" href="{{route('admin.user')}}">
                    <div class="d-flex rounded py-2 px-3 mx-2 my-1 btn btn-outline-primary">
                        <span class="d-flex align-items-center"><img src="{{url('images/ic_baseline-person.png')}}" alt="" style="height: 24px; width: 24px" class="navitem-logo"></span>
                        <span class="d-flex ps-2 flex-grow-1 align-items-center text-white">Users</span>
                    </div>
                </a>
                <a class="text-decoration-none text-white" href="{{route('logout')}}">
                    <div class="d-flex rounded py-2 px-3 mx-2 my-1 btn btn-outline-primary">
                        <span class="d-flex align-items-center"><img src="{{url('images/mdi_logout.png')}}" alt="" style="height: 24px; width: 24px" class="navitem-logo"></span>
                        <span class="d-flex ps-2 flex-grow-1 align-items-center text-white">Logout</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</nav>
