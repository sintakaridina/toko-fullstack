@extends('layouts.admin')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-12 mb-4">
         <br>
         <br>
         <br>
      </div>
      <div class="col-md-4">
         <div class="card">
           <div class="card-body">
             <h5 class="card-title">Menu Admin</h5>
              <p class="card-text">
              <a href="/admin/post" class="btn btn-primary"> Kelola Barang</a>
              <hr>
              <a href="/admin/verifikasi" class="btn btn-primary"> Verifikasi Pembayaran</a>
              </p>
           </div>
         </div>
      </div>
   </div>
</div>
@endsection