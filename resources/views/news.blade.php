<!DOCTYPE html>
<html lang="en">
@include('includes.head')

<body>
    <x-headerBack></x-headerBack>
    <div class="border border-secondary-subtle py-4 px-4 my-1 bg-white scrollbar" style="overflow:auto; max-height: 80vh">
        <div class="mb-2 d-inline-flex align-items-center">
            <img src="{{ url('images/ic_news.png') }}" alt="" style="height: 24px; width: 24px" class="me-1">
            <span class="fs-5">News</span>
        </div>
        <div class="container">
            @foreach ($news as $newsss)
                @if ($loop->iteration % 2 == 1)
                    <div class="row row-cols-2 gx-4 gy-0 mb-3">
                @endif
                <div class="col">
                    <a class="text-decoration-none" href="{{ route('news.detail', $newsss->id) }}">
                        <div class="card" style="width: 160px">
                            <img src="{{ '/images/news/' . $newsss->id . '.jpg' }}" class="card-img-top" alt="">
                            <div class="card-body p-2">
                                <p class="card-title fw-bold" style="font-size: 12px">{{ $newsss->title }}</p>
                                <p class="card-text text-secondary" style="font-size: 10px">
                                    {{ Str::limit($newsss->content, 80) }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @if ($loop->iteration % 2 == 0)
        </div>
        @endif
        @endforeach
    </div>
    </div>
    </div>
    <x-footer></x-footer>
</body>

</html>
