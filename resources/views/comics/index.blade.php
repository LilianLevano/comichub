<x-site-layout >
    @foreach($comics as $comic)
        <p>{{$comic}} <b>{{$comic->user}}</b> <br>
        <hr> <em>{{$comic->category->name}}</em></p>

    @endforeach

</x-site-layout>
