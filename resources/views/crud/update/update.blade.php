@extends('layouts.index')
@section('content')
<ul>
    <li><a href="{{url('updatedekor')}}">Dekorasi</a></li>
    <li><a href="{{url('updateketring')}}">Ketring</a></li>
    <li><a href="{{url('updatefoto')}}">Fotografer</a></li>
    <li><a href="{{url('updatevenue')}}">Venue</a></li>
    <li><a href="{{url('updaterias')}}">Rias dan Busana</a></li>
</ul>
@endsection