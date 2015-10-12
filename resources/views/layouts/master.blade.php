<!doctype html>
<html>
<head>
    <title>
        @yield('title', 'Developer\'s Best Friend!')
    </title>

    <meta charset='utf-8'>
    <link href="/css/p3.css" type='text/css' rel='stylesheet'>
    @yield('head')
</head>
<body>

        <h1>Developer's Best Friend!</h1>


        <section>
            @yield('content')
        </section>


</body>
</html>
