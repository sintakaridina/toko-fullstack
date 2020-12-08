@extends('layouts.admin')
 
@section('content')
<div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kelola Pesanan</li>
                </ol>
            </nav>
        </div>
        <div class="card">
                <div class="card-body">
    
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Daftar Pesanan</h2>
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
                <h4>Sudah Diverifikasi</h4>
        </div>
            <th width="20px" class="text-center">No</th>
            <th>Nama Pemesan</th>
            <th>Alamat</th>
            <th>Harga</th>
            <th>Tanggal</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($pesanan as $p)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->alamat }}</td>
            <td>{{ $p->jumlah_harga }}</td>
            <td>{{ $p->status }}</td>
            <td class="text-center">
            Sudah Terverifikasi
            </td>
        </tr>
        @endforeach
    </table>
 </div>
 </div>
@endsection