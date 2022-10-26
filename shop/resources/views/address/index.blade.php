@extends('layouts.main')
@section('content')
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
                            
                            <div class="items-list">
                                <div class="content">
                                    Name:
                                    <h2>[{{$address->getUsers->name}}]</h2>
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
                        @if(!Auth::user()->getAddress->first())
                        <div>
                            <li class="list-group-item">You need to  : <a class="btn btn-dark" href="{{ route('ua_create') }}">add address</a></li>
                        </div>
                        @endif

                        @endif

                        @empty
                        <li class="list-group-item">No categories found</li>
                        @endforelse
                    </ul>

                </div>
                {{-- <div class="me-3 mx-3">
                    {{ $categories->links() }}
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection