@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading"><center>Tambah Data Kuliner</class> 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('kuliner.store') }}" method="post" enctype="multipart/form-data">
			  		{{ csrf_field() }}

			  		<div class="form-group {{ $errors->has('nama_kuliner') ? ' has-error' : '' }}">
			  			<label class="control-label">Kuliner</label>	
			  			<input type="text" name="nama_kuliner" class="form-control"  required>
			  			@if ($errors->has('nama_kuliner'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_kuliner') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
			  			<label class="control-label">Deskripsi</label>	
			  			<textarea name="deskripsi" class="form-control"  required>
			  			</textarea>
						  @if ($errors->has('deskripsi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('deskripsi') }}</strong>
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
					  <div class="form-group {{ $errors->has('photos') ? ' has-error' : '' }}">
			  			<label class="control-label">Photo</label>	
			  			<input type="file" name="photos" class="form-control"  required>
			  			@if ($errors->has('photos'))
                            <span class="help-block">
                                <strong>{{ $errors->first('photos') }}</strong>
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