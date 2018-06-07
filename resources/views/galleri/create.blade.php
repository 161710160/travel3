@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Tambah Data Galleri  
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('galleri.store') }}" method="post" enctype="multipart/form-data">
			  		{{ csrf_field() }}
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