@extends('layouts.main')

@section('container')
  <h2 class="mb-5 text-center">Category : {{ $category }}</h2>
  <div class="row mb-5">
    @foreach ($product as $p)
      <div class="col-md-4 mb-3">
        <div class="card">
            <img src="{{ asset('storage/' . $p->image) }}" alt="" class="img-fluid">
          <div class="card-body">
            <h5 class="card-title">{{ $p->name }}</h5>
            <h6 class="card-text">{{ $p->category->name }}</h6>
            <p class="card-text">Rp {{ $p->price }}/Month</p>
            <a href="/products/{{ $p->slug }}" class="btn btn-primary">Pinjam</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection

