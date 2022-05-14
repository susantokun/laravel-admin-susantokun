<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('storage/uploads/icons/susantokun.svg')}}" />
    <meta
      name="description"
      content="System Management Susantokun - ADMIN.susantokun."
    />
    <meta
      name="keywords"
      content="admin-susantokun, info-susantokun, demo-susantokun, susantokun, vue, react, codeigniter, laravel"
    />
    <meta name="author" content="Susantokun">
    <title>SMSusantokun - Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div id="app">
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
