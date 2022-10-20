@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="header-back">
                        <h2>Item</h2>
                        <a href="{{route('i_index')}}" class="close"><span class="sr-only">Close</span></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="posts-list">
                        <div class="content">
                            <div class="truck-show">
                                <div class="line"><small>category: </small>
                                    <h5>{{$items->getCategory->category}}</h5>
                                </div>
                                <div class="line"><small>sub_category: </small>
                                    <h5>{{$items->getSubCategory->sub_category}}</h5>
                                </div>
                                <div class="line"><small>title: </small>
                                    <h5>{{$items->title}}</h5>
                                </div>
                                <div class="line"><small>price: </small>
                                    <h5>{{$items->price}}</h5>
                                </div>
                                <div class="line"><small>about: </small>
                                    <p>{{$items->about}}</p>
                                </div>
                                @if($items->photo)
                                <div class="img">
                                    <img src="{{$items->photo}}" alt="Truck photo">
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection