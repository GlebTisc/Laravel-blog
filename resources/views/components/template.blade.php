<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("/styles/styles.css")}}">
    <title>Блог</title>
    <script src="{{asset('/js/jquery.js')}}"></script>
</head>
<body>
<header>
    <h1>Блог</h1>
    <nav>
        <ul>
            <li><a href="/">Главная</a></li>
            <li><a href="/profile">Создать пользователя</a></li>
            @auth
                <li><a href="/profile/view">Профиль</a></li>
                <li><a href="/article/trash">Корзина</a></li>
                <li><a href="/experience">Опыт</a></li>
            @endauth
        </ul>
    </nav>
</header>
    {{$slot}}
</body>
</html>
