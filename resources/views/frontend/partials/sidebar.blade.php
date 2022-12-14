<div class="col-lg-4">
    <div class="sidebar">
      <div class="row">
        <div class="col-lg-12">
          <div class="sidebar-item search">
            <form id="search_form" name="gs" method="GET" action="#">
              <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
            </form>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="sidebar-item recent-posts">
            <div class="sidebar-heading">
              <h2>Recent Posts</h2>
            </div>
            <div class="content">
              <ul>
                @foreach ($recentPost as $post)
                <li><a href="{{ route('front.single', $post->slug) }}">
                  <h5>{{ $post->title }}</h5>
                  <span>{{ $post->created_at->format('M d, Y') }}</span>
                </a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="sidebar-item categories">
            <div class="sidebar-heading">
              <h2>Categories</h2>
            </div>
            <div class="content">
              <ul>
                @foreach ($categories as $category)
                <li><a href="{{ route('front.category', $category->slug) }}">- {{ $category->name }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="sidebar-item tags">
            <div class="sidebar-heading">
              <h2>Tag Clouds</h2>
            </div>
            <div class="content">
              <ul>
                @foreach ($tags as $tag)
                <li><a href="{{ route('front.tag' , $tag->slug) }}">{{ $tag->name }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
