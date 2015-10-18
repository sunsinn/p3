<!doctype html>
<html>
<head>
    <title>
        @yield('title', 'Developer\'s Best Friend!')
    </title>

    <meta charset='utf-8'>
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/readable/bootstrap.min.css" rel="stylesheet" integrity="sha256-xZf1oKvAz2ou2qhEduvwW4dDmGlmHADVup7mEqdKU6k= sha512-go0HHuJkbEVqGsIW4i045yNp9n/jCC5Dywtr9MmZ41n6h+tBhCLod4AvtLxrFp489K2KppmGbufl0iKnhMwcOQ==" crossorigin="anonymous">
    @yield('head')
</head>
<body>
        <h1>Developer's Best Friend!</h1>
        <a href = "lorem"<button type="button" class="btn btn-primary">Lorem Ipsum</button></a>
        <a href = "random"<button type="button" class="btn btn-primary">Random User</button></a>
        <a href = "password"<button type="button" class="btn btn-primary">XKCD Password</button></a>


        <section>
          <br>
            @yield('content')
        </section>


</body>
</html>
