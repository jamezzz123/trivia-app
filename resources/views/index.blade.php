<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trivia App</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div id="app"></div>
    <h1>Hello World</h1>
    @vite('resources/js/app.js')
</body>

</html>