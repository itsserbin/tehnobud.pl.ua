@php
    /* @var \App\ReadModels\LiveBlog[] $news */
    /* @var \App\ReadModels\Building $building */
@endphp
<div class="container">
    <div class="wrapper-news">
        @foreach($news as $new)
            @include('components.news-item', ['new' => $new, 'building' => $building])
        @endforeach
    </div>
</div>
