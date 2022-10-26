@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Item</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($items as $item)
                        <li class="list-group-item">
                            <div class="items-list">
                                <div class="content">
                                    <h2><span>category: </span>{{$item->getCategory->category}}</h2>
                                    <h4><span>sub_category: </span>{{$item->getSubCategory->sub_category}}</h4>
                                    <h4><span>title: </span>{{$item->title}}</h4>
                                    @if($item->photo)
                                    <h5><a href="{{$item->photo}}" target="_BLANK">Photo</a></h5>
                                    @endif
                                </div>
                                <div class="buttons">
                                    <a href="{{route('i_show', $item)}}" class="btn btn-info">Show</a>
                                    <a href="{{route('i_edit', $item)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('i_delete', $item)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No items found</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection