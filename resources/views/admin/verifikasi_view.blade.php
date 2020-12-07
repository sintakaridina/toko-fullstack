@extends('layouts.admin')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Verifikasi Pembayaran</h2>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif 
 
    <table class="table table-bordered">
        <tr>
        <div class="float-left">
                <h4>Belum Diverifikasi</h4>
        </div>
            <th width="20px" class="text-center">No</th>
            <th>Title</th>
            <th>Status</th>
            <th>Bukti Pembayaran</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($pesananVerif as $p)
        <tr>
            <td class="text-center">-</td>
            <td>{{ $p->jumlah_harga }}</td>
            <td>{{ $p->status }}</td>
            <td><img width="450px" src="{{ url('/uploads/'.$p->file) }}"></td>
            <td class="text-center">
            
            <form action="{{ url('admin/verifikasi')}}/{{$p->pesanan_id}}" method="post">
@csrf
<button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Verifikasi</button>
</form>
            </td>
        </tr>
        @endforeach
    </table>

 
 
@endsection