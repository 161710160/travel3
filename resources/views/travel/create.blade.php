@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading"><center>Tambah Data Travel</center>
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('travel.store') }}" method="post" enctype="multipart/form-data">
			  		{{ csrf_field() }}

			  		<div class="form-group {{ $errors->has('tempat_wisata') ? ' has-error' : '' }}">
			  			<label class="control-label">Destinasi</label>	
			  			<input type="text" name="tempat_wisata" class="form-control"  required>
			  			@if ($errors->has('tempat_wisata'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tempat_wisata') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('artikel') ? ' has-error' : '' }}">
			  			<label class="control-label">Deskripsi</label>	
			  			<textarea name="artikel" class="form-control"  required>
			  			</textarea>
						  @if ($errors->has('artikel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('artikel') }}</strong>
                            </span>
                        @endif
			  		</div>


			  		<div class="form-group {{ $errors->has('kategori_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Kota</label>	
			  			<select name="kategori_id" class="form-control">
			  				@foreach($kategori as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama_wisata }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('kategori_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kategori_id') }}</strong>
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