<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('page_title') | Bangla Blog </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('auth/css/styles.css') }}">

  </head>
  <body>
       <section class="login_img">
        <div class="container-fluid">
          <div class="row">
            <div class="login-form">
              <div class="card">
                <div class="card-header">
                  <h4 class="">@yield('page_title')</h4>
                </div>
                <div class="card-body">
                  @yield('content')
                </div>
              </div>
            </div>
          </div>
        </div>
       </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
