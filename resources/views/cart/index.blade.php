@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Keranjang Belanja</li>
                </ol>
            </nav>
        </div>
    
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Keranjang Belanja</h2>
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
            <th width="20px" class="text-center">No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($cartsBarang as $cart)
        <tr>
            <td class="text-center">-</td>
            <td>{{ $cart->nama_barang }}</td>
            <td>{{ $cart->jumlah_barang }}</td>
            <td>{{ $cart->jumlah_harga }}</td>
            <td class="text-center">
            <a href="/cart/hapus/{{ $cart->barang_id }}">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
    
    <div class="col-md-12">
            <a href="/cart/checkout" class="btn btn-primary"><i class="fa fa-arrow-left"></i>CheckOut</a>
        </div>


</div>
</div> 
@endsection