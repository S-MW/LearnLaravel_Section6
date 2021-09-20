<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="/css/app.css"> -->

    <title>Section 6 : Request</title>
</head>
<body>
    @include('inc.navbar')
    <div class="container">
        <h1 class="bg-info text-center">@yield('bold_text')</h1>
    @yield('content')
    </div>

</body>
<footer id="footer123" class="text-center">
    <p> Copyright 2021 &copy;  </p>
</footer>
</html>