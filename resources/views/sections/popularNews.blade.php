<div class="popular-news">
    <div class="popular-news-wrapper">
      <h4 class="popular-news__title">Cамые популярные новости</h4>
      <ul class="popular-news__list">
        @foreach (  $popularposts as  $popularpost )
        <li class="popular-news__item">
          <a href="{{ route('postDetaile',$popularpost->slug) }}">
            <p class="popular-news__description">{{ $popularpost['title_'.\App::getLocale()] }}</p>
            <span class="popular-news__date">{{ $popularpost->created_at->format('H:i / d.m.Y') }}/ {{ $popularpost->view }}</span>
          </a>
        </li>
        @endforeach
      </ul>
    </div>
    <div class="ads-placeholder">
        <h4>ADS PLACEHOLDER</h4>
    </div>
  </div>