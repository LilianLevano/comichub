

<x-site-layout>
    @foreach($categories as $category)
        <p>{{$category}} -> <b>{{$category->comics}}</b></p>
    @endforeach
</x-site-layout>
