@extends('layouts.site')

@section('title')
    Qiduruv natijasi
@endsection

@section('content')
<section class="news">
    <div class="container">
      <div class="news__wrapper basic-flex">
        <div class="column-news">
          <h2 class="news__title">
            @if (count($posts)>0)
            {{ $key }} kalit so'zi bo'yicha qiduruv natijalari : {{ count($posts) }}
            @else
              {{ $key }} kaliti sozi bo'yicha qiduruv natijasi topilmadi
            @endif  
          </h2>
          <ul class="news__list basic-flex">
            @foreach ( $posts as $post )
            <li class="news__item">
              <a href="{{ route('postDetaile',$post->slug) }}" class="basic-flex news__link">
                <div class="news-image-wrapper"><img src="/site/images/posts/{{ $post->img }}" alt="Bottom Img"></div>
                <div class="news-box basic-flex">
                  <h4 class="news__title">{{ $post['title_'.\App::getLocale()] }}</h4>
                  <p class="news__description">{!! \Str::limit($post['body_'.\App::getLocale()],100) !!}</p>
                  <span class="news__date basic-flex">{{ $post->created_at->format('H:i / m.d.Y') }}</span>
                </div>
              </a>
            </li>
            @endforeach
          </ul>
          <button type="button" class="btn load-more-btn">Больше новостей</button>
        </div>
        @include('sections.popularNews')
      </div>
    </div>
  </section>
@endsection