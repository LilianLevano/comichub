@foreach($comics as $comic)
    <p>{{$comic}} <b>{{$comic->user}}</b></p>

@endforeach
