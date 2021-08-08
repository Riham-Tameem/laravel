@extends("layouts.bootstrap")

@section("title",$title)
@section("css")
    <link href="{{asset('/css/about.css')}}" rel="stylesheet"/>
@endsection
@section("content")
    <img width='600' src='{{$image}}' />
    <p>{{$details}}</p>

    @if(count($contacts))
    <h4> Contact info</h4>
    <ul>
        @foreach($contacts as $x=>$y)
        <li>{{$x}}: {{$y}}</li>
        @endforeach
    </ul>
    @endif
@endsection