@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<div class="panel-title pull-right"><a href="{{ route('galleri.create') }}">Tambah</a>
			  	</div>
			  </div>

              <h3><u>Data Galleri</u></h3><br>
							
			  <div class="panel-body">
              <div class="table-responsive">
				  <table class="table table-borderless table-striped table-earning">
				<thead>
			  	<tr>
			  		
						<th>No</th>
					  <th>Photo</th>
					  <th colspan="3">Action</th>
			  	</tr>
				</thead>

				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($galleri as $data)
				  	  	<tr>
				    	<td>{{ $no++ }}</td>
							<td><img src="{{asset('../img/'.$data->photos.'')}}" width="70" height="70"></td>

<td>
	<a class="btn btn-warning" href="{{ route('galleri.edit',$data->id) }}">Edit</a>
</td>
<td>
	<form method="post" action="{{ route('galleri.destroy',$data->id) }}">
		<input name="_token" type="hidden" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">

		<button type="submit" class="btn btn-danger">Delete</button>
	</form>
</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection