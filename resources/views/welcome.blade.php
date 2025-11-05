<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shalom Books Bi</title>

        @vite([
            "resources/css/app.css"
        ])
    </head>

    <body>
        @vite([
            "resources/js/app.js"
        ])
    </body>
</html>
