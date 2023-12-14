@extends('layouts.main')

@section('container')

@if (session()->has('success'))

    <div class="alert alert-success col-lg-6" role="alert">
        {{ session('success') }}
    </div>
    
@endif

@if(session()->has('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
      <form action="/products" method="GET">
          @if (request('name'))
              <input type="hidden" name="category" value="{{ request('name') }}">
          @endif
          <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
              <button class="btn btn-dark" type="submit">Search</button>
          </div>
      </form>
  </div>
</div>

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
            <a href="/products/{{ $product->slug }}" class="btn btn-primary {{ $product->stock === 0 ? 'disabled' : '' }}"
              @if($product->stock === 0) aria-disabled="true" disabled @endif>
              {{ $product->stock === 0 ? 'Stok Habis' : 'Pinjam' }}
           </a>           
        </div>
        </div>
    </div>

    @endforeach
</div>
@endsection
