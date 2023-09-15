<div class="header-container container text-center">
    <div class="row justify-content-center align-items-center w-100 h-100 mx-0">
        <div class="col-3">
            <a onclick="backAlert()" style="cursor: pointer"><img src="{{url('images/mdi_arrow-left.png')}}" alt=""></a>
            <a href="{{url()->previous()}}" style="display:none" id="backHref"></a>
        </div>
        <div class="col-6">
            <a href="{{route('home')}}" class=""><img src="{{url('/images/logo.png')}}" alt="logo" class="logo"></a>
        </div>
        <div class="col"></div>
    </div>
    <script>
        function backAlert(){
            Swal.fire({
                title: 'Apakah anda yakin ingin kembali?',
                text: "Data yang telah diisi kemungkinan akan hilang",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Kembali',
                width: '24em'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('backHref').click();
                }
            });
        }
    </script>
</div>
