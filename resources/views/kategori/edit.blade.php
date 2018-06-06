@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Destinasi 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('kategori.update',$kategori->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama_wisata') ? ' has-error' : '' }}">
			  			<label class="control-label">Kota</label>	
			  			<input type="text" name="nama_wisata" class="form-control" value="{{ $kategori->nama_wisata }}"  required>
			  			@if ($errors->has('nama_wisata'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_wisata') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection