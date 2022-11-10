@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>SubCategory</h2>
                    <a href="{{route('subc_index')}}" class="close"><span class="sr-only">Close</span></a>
                </div>
                <div class="card-body">
                    <div class="category">
                        <h5>{{$subCategory->sub_category}}</h5>
                    </div>
                    <ul class="list-group">
                        @forelse($subCategory->items as $item)
                        <li class="list-group-item">
                            <div class="items-list">
                                <div class="content">
                                    <h4><span>category: </span>{{$item->getCategory->category}}</h4>
                                    <h2><span>title: </span>{{$item->title}}</h2>
                                    <h4><span>price: </span>{{$item->price}}</h4> 
                                </div>
                                <div class="buttons">
                                    <a href="{{route('show', $item->id)}}" class="btn btn-info">Show</a>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No item found</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection