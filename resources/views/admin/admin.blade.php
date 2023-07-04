<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html data-bs-theme="dark">
@include('includes.headAdmin')
<body>
    <x-navbarAdmin></x-navbarAdmin>
    <div class="mx-1 my-2 px-2">
        <p class="mb-0 mt-2">Welcome, {{Auth::user() ? Auth::user()->name : 'NULL'}}!</p>
        <p>Start managing TIKETIN by accessing menu on navbar</p>
        <span class="mb-0">You can also check the user interface using this account by accessing</span>
        <span><a href="{{route('home')}}" class="mb-0">this page</a></span>
        <p>(Go to settings to return to this page)</p>
    </div>
</body>
</html>
