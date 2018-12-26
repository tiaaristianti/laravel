@extends('layouts.crud.index')
@include('layouts.app')
@section('content')
<div class="section">
	@foreach($riass as $rias)

	<div class="row">
		<div class="col s12">
            <h5>{{ $rias->nama }}</h5>
            
            <div class="divider"></div>
            <p>Rp. {!!substr($rias->harga,0,200)!!}...</p>
            <img src="{{ asset('images/'.$rias->gambar)  }}" style="max-height:200px;max-width:200px;margin-top:10px;">

            @if (Route::has('login'))

			@auth

			@if (auth()->id()==$rias->user_id)
			<form action="" method="post"> </form>
			{{csrf_field()}}
			{{method_field('delete')}}

			<a href="{{ url('editrias', $rias->id) }}" class="btn btn-flat blue darken-4 waves-effect waves-light white-text">Edit <i class="material-icons right">mode_edit</i></a>
			<a href="{{ url('deleterias', $rias->id) }}" onclick="return confirm('Yakin mau hapus data ini sob?')" class="btn btn-flat red darken-4 waves-effect waves-light white-text">Delete <i class="material-icons right">delete</i></a>

			@endif

			@endauth

			@endif
            <a href="{{url('readrias', $rias->slug_rias)}}" class="btn btn-flat pink accent-3 waves-effect waves-light white-text">Readmore <i class="material-icons right">send</i></a>
			<!-- <a href="{{url('editrias', $rias->id) }}" class="btn btn-flat purple darken-4 waves-effect waves-light white-text">Edit <i class="material-icons right">mode_edit</i></a>
            <a href="{{url('deleterias', $rias->id) }}" onclick="return confirm('Yakin mau hapus data ini sob?')" class="btn btn-flat red darken-4 waves-effect waves-light white-text">Delete <i class="material-icons right">delete</i></a>    
            <button><a href="{{url('read', $rias->id)}}">Readmore</a>
            <button>Edit 
            <button>Delete  -->
		</div>
	</div>
	@endforeach

</div>
@endsection