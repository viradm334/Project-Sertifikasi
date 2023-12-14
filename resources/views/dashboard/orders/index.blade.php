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

<div class="table-responsive small col-lg-13">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Renter</th>
          <th scope="col">Product</th>
          <th scope="col">Rent Date</th>
          <th scope="col">Rent Limit</th>
          <th scope="col">Status</th>
          <th scope="col">Actual Return Date</th>
          <th scope="col">Denda</th>
          <th scope="col" class="aksi">Aksi</th>
        </tr>
      </thead>
      <tbody>
         @foreach($orders as $order)   
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $order->user->name }}</td>
          <td>{{ $order->product->name }}</td>
          <td>{{ $order->rent_date }}</td>
          <td>{{ $order->return_date }}</td>
          <td>
            @if($order->status == false)
            Not Returned
            @else
            Returned
            @endif
        </td>
          <td>{{ $order->actual_return_date }}</td>
          <td>{{ $order->denda }}</td>
          <td class="aksi">
            @if($order->request_return == true  && $order->status == false)
            <form action="/return-product/{{ $order->id }}" method="POST">
              @csrf
              <button type="submit" value="{{ $order->id }}" class="btn btn-primary">Return</button>
            </form>
            @else
            No Action
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
    
@endsection