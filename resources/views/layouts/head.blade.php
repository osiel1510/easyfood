<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>@yield('titulo')</title>
        <script src="https://cdn.tailwindcss.com"></script>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
        <link rel="icon" href="{{ asset('images/logoMain.png') }}" type="image/x-icon">

    </head>

    <body class="bg-gray-100 h-screen w-screen">
