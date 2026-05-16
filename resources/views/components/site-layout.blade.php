<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? 'ComicHub'}}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>


<body class="">

    <x-site-layout-navigation/>

    <main class="mt-10 mb-[400px]">

        <div class="flex justify-center my-10">
            <h1 class="text-4xl font-bold tracking-tight text-gray-800 border-b-4 border-blue-400 pb-2">{{ $title }}</h1>
        </div>

        {{$slot}}
    </main>

    <x-site-layout-footer/>

</body>
</html>
