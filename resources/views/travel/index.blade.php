@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<div class="panel-title pull-right"><a href="{{ route('travel.create') }}">Tambah</a>
                  </div>
              </div>
              <h3>Travel</h3>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table border='5' class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
                      <th>Tempat wisata</th>
                      <th>Artikel</th>
											<th>Destinasi</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($travel as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
                        <td>{{ $data->tempat_wisata}}</td>
                        <td>{{ $data->artikel}}</td>
												<td>{{ $data->kategori->nama_wisata}}</td>

<td>
	<a class="btn btn-warning" href="{{ route('travel.edit',$data->id) }}">Edit</a>
</td>
<td>
	<form method="post" action="{{ route('travel.destroy',$data->id) }}">
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