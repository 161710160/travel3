@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  	<div class="panel-title pull-right"><a href="{{ route('kuliner.create') }}">Tambah</a>
                  </div>
              </div>
              <h3><u><center>Kuliner</center></u></h3><br>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table table-borderless table-striped table-earning">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
              <th>Nama Kuliner</th>
              <th>Deskripsi</th>
							<th>Kota</th>
							<th>Photo</th>
					    <th colspan="3">Action</th>
			  		</tr>
				  	  </thead>
				  	  <tbody>
				  	   	<?php $nomor = 1; ?>
				  		  @php $no = 1; @endphp
				  		  @foreach($kuliner as $data)
				  	    <tr>
				      	<td>{{ $no++ }}</td>
                <td>{{ $data->nama_kuliner}}</td>
                <td>{{ $data->deskripsi}}</td>
								<td>{{ $data->kategori->nama_wisata}}</td>


<td>
	<a class="btn btn-warning" href="{{ route('kuliner.edit',$data->id) }}">Edit</a>
</td>
<td>
	<form method="post" action="{{ route('kuliner.destroy',$data->id) }}">
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