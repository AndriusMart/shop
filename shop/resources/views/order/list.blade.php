@extends('layouts.admin')
@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Orders <small>[{{$orders->count()}}]</small></h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($orders as $order)
                        <li class="list-group-item">
                            <div class="hotels-list">
                                <div class="content">
                                    <div class="content">
                                        <h2><span>User Name: </span>{{$order->getUsers->name}}</h2>
                                        <div class="order-list-border"> 
                                            <h2>Items:</h2>
                                            @foreach(json_decode($order->item_id) as $item)
                                            <div class="order-list">
                                                <h4><span>title: </span>{{$item->name}}</h4>
                                                <h4><span>quant: </span>{{$item->quantity}}</h4>
                                                <h4><span>price: </span>{{$item->price}}</h4>
                                            </div>
                                            @endforeach
                                        </div>
                                        <h4><span>Total: $</span>{{$order->total}}</h4>
                                        <h4><span>Adderss: </span>{{$order->getUsers->getAddress->first()->address}}
                                        </h4>
                                        <h4><span>Postal code:
                                            </span>{{$order->getUsers->getAddress->first()->postal_code}}</h4>
                                        <h4><span>Phone: </span>{{$order->getUsers->getAddress->first()->phone}}</h4>
                                        <h4><span>Status: </span>{{$order->status}}</h4>
                                    </div>
                                    <div class="buttons">
                                        <a href="{{route('o_edit', $order)}}" class="btn btn-success">Edit</a>
                                        <form action="{{route('o_delete', $order)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No countries found</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection