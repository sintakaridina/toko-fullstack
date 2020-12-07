@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Verifikasi Pembayaran</li>
                </ol>
            </nav>
        </div>
		<div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
        <div class="col-lg-8 mx-auto my-5">	
		@foreach($pembayaran as $p)
				<p>Silahkan melakukan pembayaran ke rekening Bni a/n Sinta Karidina 00298827716 , dan mengunggah bukti pembayaran brupa struk/screenshoot transfer.</p>
				Total tagihan : Rp.{{ (number_format ($p->jumlah_harga)) }}
				@endforeach
				
 
				<form action="/verif/proses" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
 
					<div class="form-group">
						<b>File Gambar</b><br/>
						<input type="file" name="file">
					</div>
 
 
					<input type="submit" value="Upload" class="btn btn-primary">
				</form>
				@foreach($gambar as $g)
				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif
				<table class="table table-bordered table-striped">
					
					<tbody>
						
						<tr>
							<td><img width="150px" src="{{ url('/uploads/'.$g->file) }}"></td>
							<td>Terimakasih. Bukti Pembayaran telah disimpan.</td>
							<td><a class="btn btn-danger" href="/verif/hapus/{{ $g->id }}">HAPUS</a></td>
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
</div>
@endsection
