<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? 'ComicHub'}}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>



</head>


<body class="p-5">

<header class="flex flex-col items-center mt-8">

    <nav class="w-[90%] max-w-5xl backdrop-blur-md shadow-xl rounded-3xl border border-black/10 px-10 py-5">
        <ul class="flex justify-between items-center text-lg">
            <div class="flex gap-8 ">
                <x-nav-bar-element link="/" content="Home"/>
                <x-nav-bar-element link="/categories" content="Categories"/>
                <x-nav-bar-element link="/comics" content="Comics"/>
            </div>

            <span>ComicHub</span>

        </ul>
    </nav>


</header>



<main class="mt-10">

    <div class="flex justify-center my-10">
        <h1 class="text-4xl font-bold tracking-tight text-gray-800 border-b-4 border-blue-400 pb-2">{{ $header ?? '' }}</h1>
    </div>

    {{$slot}}
</main>
</body>
</html>
