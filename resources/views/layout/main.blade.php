<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shalom Books Bi</title>

        @vite([
            "resources/css/app.css"
        ])
    </head>

    <body>
        <nav class="navbar navbar-expand-lg bg-black mb-4">
            <div class="container-fluid">
                <h4 class="text-light">Shalom Books Bi</h4>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="/livros">Livros</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid">
            @yield('body')
        </div>

        @vite([
            "resources/js/app.js"
        ])
    </body>
</html>
