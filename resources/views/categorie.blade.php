@extends('layouts.main')

@section('container')
  <h1 class="mb-5">Category : {{ $category }}</h1>
  <div class="row">
    @foreach ($product as $p)
      <div class="col-md-3 mb-4">
        <div class="card" style="width: 18rem;">
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

