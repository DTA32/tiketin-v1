<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
    <x-headerBack></x-headerBack>
    @if ($news == null)
        <p class="text-center text-danger mt-5 fw-bold fs-3">News not found or doesn't exist</p>
    @else
        <div class="mt-1">
            <img src="{{Storage::url('app/public/'.$news->image)}}" alt="" style="width: 100%; height: 190px; object-fit: cover; background-repeat: no-repeat">
        </div>
        <div class="py-3 px-3 bg-white" style="overflow:auto; max-height: 80vh">
            <p class="mb-0 fs-4 fw-bold">{{$news->title}}</p>
            <div class="d-inline-flex">
                <p class="text-secondary" style="font-size: 12px">Created by: {{$news->author}}</p>
                <p class="ps-2 text-secondary" style="font-size: 12px">Date Created: {{$news->created_at->format('d/m/Y')}}</p>
            </div>
            <div>
                {{$news->content}}
            </div>
        </div>
    @endif
</body>
</html>
