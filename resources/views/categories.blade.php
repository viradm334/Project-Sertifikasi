@extends('layouts.main')

@section('container')

<h2 class="mb-5 text-center">Categories</h2>

<div class="container mb-5">
    <div class="row">
        @foreach ($category as $p)
        <div class="col-md-4 mb-3">
            <a href="/categories/{{ $p->slug }}">
            <div class="card text-bg-dark">
                <img src="https://source.unsplash.com/300x300?{{ $p->name }}" class="card-img" alt="{{ $p->name }}">
                <div class="card-img-overlay d-flex align-items-center p-0">
                  <h5 class="card-title text-center flex-fill p-4" style="background-color: rgba(0, 0, 0, 0.7)">{{ $p->name }}</h5>
                </div>
            </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection

