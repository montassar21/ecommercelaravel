
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Client dashboard</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
            <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
            <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
            <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
            <link rel="manifest" href="assets/img/favicons/manifest.json">
            <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
            <meta name="theme-color" content="#ffffff">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
                rel="stylesheet">
            <link
                href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
                rel="stylesheet">
            <link href="{{ asset('dashassets/css/phoenix.min.css') }}" rel="stylesheet" id="style-default">
            <link href="{{ asset('dashassets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
        </head>

        <body>
            <main class="main" id="top">
                <div class="container-fluid px-0">
                    @include('inc.client.sidebar')
                    @include('inc.client.navbar')
                    <div class="content">
                        @include('inc.message')
                        <h1 class="m-3">Client Edit Profile</h1>
                        <form action="/modifyProfile" method="post">
                        @csrf
                        <input hidden value="{{Auth::user()->id}}" name="id">
                        <div class="mb-3"><label class="form-label" for="exampleFormControlInput1">User name</label> <input class="form-control" id="exampleFormControlInput1"value="{{Auth::user()->name}}" type="name"  name="name"  placeholder="username"></div>
                        <div class="mb-3"><label class="form-label" for="exampleFormControlInput1">Email address</label> <input class="form-control" id="exampleFormControlInput1" value="{{Auth::user()->email}}" name="email"  type="email" placeholder="name@example.com"></div>
                        <div class="mb-3"><label class="form-label" for="exampleFormControlInput1">Password</label> <input class="form-control" id="exampleFormControlInput1"  name="password" type="password" placeholder="password"></div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                        @include('inc.admin.footer')
                    </div>
                </div>
            </main>
        </body>
        <script src="{{ asset('dashassets/js/phoenix.js') }}"></script>
        <script src="{{ asset('dashassets/js/ecommerce-dashboard.js') }}"></script>

        </html>
