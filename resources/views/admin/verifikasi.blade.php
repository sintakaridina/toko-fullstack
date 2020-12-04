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
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($pesananNonVerif as $p)
        <tr>
            <td class="text-center">-</td>
            <td>{{ $p->jumlah_harga }}</td>
            <td>{{ $p->status }}</td>
            <td class="text-center">
            <form method="post" action="/admin/verifikasi/{{ $p->id }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Verifikasi">
                    </div>
 
            </form>
            </td>
        </tr>
        @endforeach
    </table>

    <table class="table table-bordered">
        <tr>
        <div class="float-left">
                <h4>Sudah Diverifikasi</h4>
        </div>
            <th width="20px" class="text-center">No</th>
            <th>Title</th>
            <th>Status</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($pesananVerif as $p)
        <tr>
            <td class="text-center">-</td>
            <td>{{ $p->jumlah_harga }}</td>
            <td>{{ $p->status }}</td>
            <td class="text-center">
            Sudah Terverifikasi
            </td>
        </tr>
        @endforeach
    </table>
 
@endsection