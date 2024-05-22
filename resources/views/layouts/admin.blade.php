<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <title>Boolpress | Admin</title>
</head>
<body>

    <header>
        @include('admin.partials.header')
    </header>

    <main class="d-flex">

        <div class="aside">
            <h1>aside</h1>
        </div>


        <div>
            @yield('content')
        </div>
    </main>


</body>
</html>
