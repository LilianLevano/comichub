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


<body>

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

    <div>
        <h1>{{$header ?? ''}}</h1>
    </div>
</header>



<main>
    {{$slot}}
</main>
</body>
</html>
