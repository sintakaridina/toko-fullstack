@extends('layouts.admin')
 
@section('content')
<div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/post')}}">Kelola Barang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lihat Barang</li>
                </ol>
            </nav>
        </div>
        <div class="card">
                <div class="card-body">    
    
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('post.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    <div class="row">
    <div class="col-md-6">
                            <img src="{{ url('uploads') }}/{{ $post->gambar }}" class="rounded mx-auto d-block"
                                width="50%" alt="">
                        </div>
    <div class="col-md-6 mt-5">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Barang:</strong>
                {{ $post->nama_barang }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga:</strong>
                {{ $post->harga }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stok:</strong>
                {{ $post->stok }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Keterangan:</strong>
                {{ $post->keterangan }}
            </div>
        </div>
    </div>

    </div>
    </div>
@endsection