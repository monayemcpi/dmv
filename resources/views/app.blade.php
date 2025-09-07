<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DMV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/public/css/all.min.css') }}">
  </head>
  <body>
    
<header>
    <nav class="navbar navbar-light navbar-expand-lg bg-success text-white" >
      <div class="container">
        <a class="navbar-brand text-white" href="{{ url('/') }}"> <i class="fa-solid fa-car"></i> DMV</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link text-white" href="{{ url('/')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="{{ route('questions.index') }}">Questions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="{{ route('exams.index') }}">Exams</a>
            </li>
          </ul>
        </div>

      </div>
    </nav>
</header>

<main>
  <div class="container">
    <div class="row">
        <div class="col-md-12">

          <div class="mt-3">

            @session('success')
                <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession

            @session('danger')
                <div class="alert alert-danger" role="alert"> {{ $value }} </div>
            @endsession

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

          </div>


          @yield('content')

        </div>
    </div>
</div>
</main>

    <script type="text/javascript" src="{{ asset('/public/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/public/js/jquery.validate.min.js') }}"></script>
    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>