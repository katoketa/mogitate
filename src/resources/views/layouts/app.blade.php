<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
    <title>もぎたて</title>
</head>

<body>
    <header class="header">
        <h2 class="header__title">mogitate</h2>
    </header>
    <main class="content">
        @yield('content')
    </main>
</body>

</html>