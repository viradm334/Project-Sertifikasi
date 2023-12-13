@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Orders</h1>
</div>

@if (session()->has('success'))

    <div class="alert alert-success col-lg-6" role="alert">
        {{ session('success') }}
    </div>
    
@endif

<div class="table-responsive small col-lg-11">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Peminjam</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Unit</th>
          <th scope="col">Tanggal Pinjam</th>
          <th scope="col">Tanggal Kembali</th>
          <th scope="col">Sudah dikembalikan</th>
          <th scope="col">Denda</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
         @foreach($orders as $order)   
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $order->user->name }}</td>
          <td>{{ $order->product->name }}</td>
          <td>{{ $order->name }}</td>
          <td>{{ $order->tgl_pinjam }}</td>
          <td>{{ $order->tgl_kembali }}</td>
          <td>
            @if($order->is_returned === 1)
            Yes
            @else
            No
            @endif
          </td>
          <td>{{ $order->denda }}</td>
          <td>
            <button class="btn btn-primary">Kembalikan</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
    
@endsection