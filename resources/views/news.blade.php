<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-headerBack></x-headerBack>
    <div class="border border-secondary-subtle py-4 px-4 my-1 bg-white" style="overflow:auto; max-height: 80vh">
        <p class="mb-2 fs-5">News</p>
        <div></div> {{-- news cards here --}}
    </div>
    <x-footer></x-footer>
</body>
</html>
