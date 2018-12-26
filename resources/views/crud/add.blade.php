@include('layouts.app')
@extends('layouts.crud.index')
@section('content')
<div class="section">
<ul>
    <li><a href="{{url('dekorasi')}}">Dekorasi</a></li>
    <li><a href="{{url('ketring')}}">Ketring</a></li>
    <li><a href="{{url('foto')}}">Fotografer</a></li>
    <li><a href="{{url('venue')}}">Venue</a></li>
    <li><a href="{{url('rias')}}">Rias dan Busana</a></li>
</ul>
</div>
@endsection