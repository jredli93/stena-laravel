<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
        rel="stylesheet"
    />
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('eacs/css/bootstrap.min.css') }}" />
    <!-- custom style -->
    <link rel="stylesheet" href="{{ asset('eacs/css/style.css') }}" />
    <title>EuroAthlantic</title>
</head>

<body>
@include('pages.includes.top-bar')
@yield('content')
</body>


<footer>
@include('pages.includes.footer')
</footer>
