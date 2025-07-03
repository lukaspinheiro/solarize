<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    {{-- Força URL correta para o Vite Dev Server --}}
    @vite(['resources/css/app.css', 'resources/js/app.tsx'])

    @inertiaHead
</head>
<body>
    @inertia
</body>
</html>
