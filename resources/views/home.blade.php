@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{url('add')}}">Tambah Jasa</a><br>
                    <a href="{{url('showdekor')}}">Dekorasi</a><br>
                    <a href="{{url('showfoto')}}">Fotografer</a><br>
                    <a href="{{url('showvenue')}}">Venue</a><br>
                    <a href="{{url('showketring')}}">Catering</a><br>
                    <a href="{{url('showrias')}}">Rias dan Busana</a><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
