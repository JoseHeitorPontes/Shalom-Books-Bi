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
                        <a class="nav-link text-white" href="/">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="/livros">Livros</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="/clientes">Clientes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="/vendas">Vendas</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid main-content">
            @yield('body')
        </div>

        <footer class="h-8rem bg-black">
            <div class="d-flex gap-4 justify-content-center text-light py-2">
                <div class="text-center">
                    <i class="bi bi-book fs-3"></i>
                    <p>Dashboard</p>
                </div>

                <div class="text-center">
                    <i class="bi bi-receipt fs-3"></i>
                    <p>Vendas</p>
                </div>

                <div class="text-center">
                    <i class="bi bi-people fs-3"></i>
                    <p>Clientes</p>
                </div>

                <div class="text-center">
                    <i class="bi bi-bar-chart fs-3"></i>
                    <p>Dashboard</p>
                </div>
            </div>
            
            <p class="text-light text-center">© 2025 - Shalom Books Bi</p>
        </footer>

        @vite([
            "resources/js/app.js"
        ])

        @yield('scripts')
    </body>
</html>
