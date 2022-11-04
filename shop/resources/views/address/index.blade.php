@extends('layouts.main')
@section('content')
@if(!Auth::user()->getAddress->first())
<div class="section-space-small"></div>
<section class="hero new">
    <div class="new-info ">
        <h2>No Info!</h2>
        <h4>You need to</h4>
        <a href="{{'list'}}"><i class="fa fa-arrow-right" aria-hidden="true"></i>Add address<i class="fa fa-arrow-left"
                aria-hidden="true"></i></a>
    </div>
</section>
@else
<div class="section-space"></div>
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Info</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($addresses as $address)
                        @if(Auth::user()->name == $address->getUsers->name)
                        <li class="list-group-item">
                            <div class="list-group-address">
                                <div class="content">
                                    Name:
                                    <h2>{{$address->getUsers->name}}</h2>
                                    Address:
                                    <h2>{{$address->address}}</h2>

                                    <h2>{{$address->city}}</h2>
                                    <h2>{{$address->phone}}</h2>
                                    <h2>{{$address->postal_code}}</h2>
                                </div>
                                <div class="buttons">
                                    <a href="{{route('ua_edit', $address)}}" class="btn btn-success">Edit</a>
                                </div>
                            </div>
                        </li>
                        @endif
                        @empty
                        <li class="list-group-item">No addresses found</li>
                        @endforelse
                    </ul>

                </div>
                {{-- <div class="me-3 mx-3">
                    {{ $categories->links() }}
                </div> --}}
            </div>
        </div>
    </div>
    <div class="section-space-small"></div>
    <div class="buttons">
        <a href="{{route('list')}}" class="pulse now">Shop now.</a>
    </div>
    <div class="section-space-small"></div>
</div>
@endif
@endsection