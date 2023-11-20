<!DOCTYPE html>
<html lang="en">
@include('includes.head')

<body style="overflow:hidden">
    <x-headerBack></x-headerBack>
    @if ($news == null)
        <p class="text-center text-danger mt-5 fw-bold fs-3">News not found or doesn't exist</p>
    @else
        <div class="scrollbar" style="overflow:auto; max-height: 95vh">
            <div class="mt-1">
                <img src="{{ '/images/news/' . $news->id . '.jpg' }}" alt=""
                    style="width: 100%; height: 190px; object-fit: cover; background-repeat: no-repeat">
            </div>
            <div class="pt-3 pb-5 px-3 bg-white">
                <p class="mb-0 fs-4 fw-bold">{{ $news->title }}</p>
                <div class="d-inline-flex">
                    <p class="text-secondary" style="font-size: 12px">Created by: {{ $news->author }}</p>
                    <p class="ps-2 text-secondary" style="font-size: 12px">Date Created:
                        {{ $news->created_at->format('d/m/Y') }}</p>
                </div>
                <div>
                    {{ $news->content }}
                </div>
            </div>
        </div>
    @endif
</body>

</html>
