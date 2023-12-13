@extends('layouts.main')

@section('container')
<h1>Category</h1>
<ul>
    @foreach ($category as $p)
        <li><a class="text-decoration-none text-danger " href="/categories/{{ $p->slug }}">{{ $p->name }}</a></li>
    @endforeach
</ul>
@endsection

