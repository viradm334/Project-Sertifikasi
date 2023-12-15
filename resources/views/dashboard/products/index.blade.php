@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Products</h1>
</div>

@if (session()->has('success'))

    <div class="alert alert-success col-lg-6" role="alert">
        {{ session('success') }}
    </div>

@endif

<div class="table-responsive small col-lg-10">
    <a href="/dashboard/products/create" class="btn btn-primary mb-3">Create new product</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Stok</th>
          <th scope="col">Kategori</th>
          <th scope="col">Harga</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
       @foreach($products as $product)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->stock }}</td>
          <td>
            @foreach ($product->categories as $category)
            <a class="">{{ $category->name }}</a>,
            @endforeach
          </td>
          <td>{{ number_format($product->price) }}</td>
          <td>
            <a href="/dashboard/products/{{ $product->id }}" class="badge bg-info"><i class="bi bi-eye h6"></i></a>
            <a href="/dashboard/products/{{ $product->id }}/edit" class="badge bg-warning"><i class="bi bi-pen h6"></i></a>
            <form action="/dashboard/products/{{ $product->id }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-x-circle h6"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
