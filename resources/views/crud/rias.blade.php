@section('js')
<script type="text/javascript">

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });

</script>
@include('layouts.app')
@extends('layouts.crud.index')
@section('content')

<div class="section">
<form action="{{ url('storerias') }}" enctype="multipart/form-data" method="POST">
  {!! csrf_field() !!}
    <div class="row">
        <div class="input-field col s12">
            <input type="text" class="validate" name="nama">
            <label for="title">Judul</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea" name="harga"></textarea>
          <label for="textarea1">Harga</label>
        </div>
    </div>

    <div class="row">
        <div class="col s6">
            <img src="http://placehold.it/100x100" id="showgambar" style="max-width:200px;max-height:200px;float:left;" />
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
          <input type="file" id="inputgambar" name="gambar" class="validate"/ >
        </div>
    </div>
    <button type="submit" class="btn btn-flat pink accent-3 waves-effect waves-light white-text right">Submit <i class="material-icons right">send</i></button>
  </form>
</div>
@endsection