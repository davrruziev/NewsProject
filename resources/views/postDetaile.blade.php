@extends('layouts.site')

@section('content')
<section class="article">
    <div class="container">
      <div class="news__wrapper basic-flex">
        <div class="article__wrapper">
          <h2 class="article__title">{{ $post['title_'.\App::getLocale()] }}</h2>
          <span class="article__date basic-flex">{{ $post->created_at->format('H:i / m.d.Y') }} / {{ $post->view }}</span>
          <img src="/site/images/posts/{{ $post->img }}" alt="Шавкат Мирзиёев строго предупредил хокимов всех уровней">
          <p> 
            {!! $post['body_'.\App::getLocale()] !!}
          </p>
          <div class="hashtags basic-flex">
            @foreach ( $post->tags as $tag )
            <a href="#">#{{ $tag['name_'.\App::getLocale()] }}</a>
            @endforeach
          </div>
        </div>
          @include('sections.popularNews')
        <div class="related-news">
          <h3 class="related-news__title">Новости по теме
          </h3>
          <div class="related-posts basic-flex">
            @foreach ( $otherPost as $other )
            <div class="posts__item">
              <a href="{{ route('postDetaile',$other->slug) }}">
                <img src="/site/images/posts/{{ $other->img }}" alt="Image" class="posts__img">
                <h2 class="posts__title">{{ $other['title_'.\App::getLocale()] }}</h2>
                <span class="posts__date">{{ $other->created_at->format('H:i / m.d.Y') }}</span>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection