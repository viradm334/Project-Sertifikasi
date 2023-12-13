@extends('layouts.main')

@section('container')
<div id="carouselExampleCaptions" class="carousel slide mb-3">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner rounded">
      <div class="carousel-item active">
        <img src="https://source.unsplash.com/1200x500?Electronics" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://source.unsplash.com/1200x500?Fridge" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://source.unsplash.com/1200x500?Printer" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
<h1 class="mb-5 text-center">All Product</h1>
<div class="row">
    @foreach ($products as $product)
    <div class="col-3">
        <div class="card mb-5 p-2 me-3">
            <img src="{{ asset('storage/' . $product->image) }}" alt="" class="img-fluid">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <h6 class="card-text">{{ $product->category->name }}</h6>
            <p class="card-text">Rp {{ $product->price }}/Month</p>
            <a href="/products/{{ $product->slug }}" class="btn btn-primary">Pinjam</a>
        </div>
        </div>
    </div>

    @endforeach
</div>
@endsection
