
@extends('layouts.main')

@section('container')
  <div class="card mx-auto mb-3">
    <div class="row g-0">
      <div class="col-md-6 p-2">
        <img src="{{ asset('storage/' . $p->image) }}" alt="" class="img-fluid">
      </div>
      <div class="col-md-6">
        <div class="card-body">
          <h1 class="card-title">{{ $p->name }}</h1>
          <p class="mt-5">Category :  <a class="text-decoration-none text-danger" href="/categories/{{ $p->category->slug }}">{{ $p->category->name }} </a></p>
          <p class="card-text">{{ $p->description }}</p>
          <h4 class="mb-5">Price : Rp {{ $p->price }}/month</h4>
          <form action="/pinjam-barang/{{ $p->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id" id="product_id" value="{{ $p->id }}">
            <div class="text-center">
              <button type="submit" class="btn btn-primary btn-lg mt-5">Pinjam</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endsection
