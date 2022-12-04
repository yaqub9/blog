<!DOCTYPE html>
<html lang="en">

  <head>
    @include('/frontend/partials/head')
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
        @include('/frontend/partials/nav')
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text">
      @yield('banner')
    </div>
    <!-- Banner Ends Here -->

    <section class="blog-posts">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                @yield('content')
              </div>
            </div>
          </div>
          @include('/frontend/partials/sidebar')
        </div>
      </div>
    </section>

    <footer>
        @include('/frontend/partials/footer')
    </footer>
        @include('/frontend/partials/script')
  </body>
</html>