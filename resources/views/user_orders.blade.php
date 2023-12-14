@extends('layouts.main')

@section('container')

<h2 class="mb-5 text-center">My Orders</h2>

<table class="table">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Product</th>
        <th scope="col">Rent Date</th>
        <th scope="col">Return Limit</th>
        <th scope="col">Status</th>
        <th scope="col">Actual Return Date</th>
        <th scope="col">Denda</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
      <tr>
        <td>{{ $loop->iteration }}</td>
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
        <td>
            @if($order->request_return == false)
            <form action="/request-return/{{ $order->id }}" method="POST">
                @csrf
                <button type="submit" value="{{ $order->id }}" class="btn btn-info">Return</button>
            </form>
            @else
            Request Sent
            @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
    
@endsection