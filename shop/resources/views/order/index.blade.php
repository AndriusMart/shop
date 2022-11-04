@extends('layouts.main')

@section('content')
<div class="section-space"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2> My Orders</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($orders as $order)
                        
                        @if(Auth::user()->name == $order->getUsers->name)
                        <li class="list-group-item">
                            <div class="hotels-list">
                                <div class="content">
                                    <div class="content">
                                        <h2><span>User Name: </span>{{$order->getUsers->name}}</h2>
                                        @foreach(json_decode($order->item_id) as  $item)
                                        <h4><span>title: </span>{{$item->name}}</h4>
                                        <h4><span>quant: </span>{{$item->quantity}}</h4>
                                        <h4><span>price: </span>{{$item->price}}</h4>
                                        @endforeach
                                        
                                        <h4><span>Status: </span>{{$order->status}}</h4>
                                        <h4><span>Total: $</span>{{$order->total}}</h4>

                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @empty
                        <li class="list-group-item">No countries found</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-space"></div>
<div class="buttons">
<a href="{{route('list')}}" class="pulse now">Shop now.</a>
</div>
<div class="section-space"></div>
@endsection