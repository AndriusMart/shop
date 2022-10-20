@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Item</h2>
                    {{-- <form action="{{route('i_index')}}" method="get">
                        <div class="container">
                            <div class="row">
                                <div class="col-5">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-10">
                                                <select name="mech" class="form-select mt-1">
                                                    <option value="0">All</option>
                                                    @foreach($mechanics as $mechanic)
                                                    <option value="{{$mechanic->id}}" @if($mech==$mechanic->id) selected @endif>{{$mechanic->name}} {{$mechanic->surname}} [{{$mechanic->getTrucks()->count()}}]</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-6">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="input-group mb-3">
                                                    
                                                    <input type="text" name="s" class="form-control" value="{{$s}}">
                                                <button type="submit" class="input-group-text">Search</button>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <a href="{{route('t_index')}}" class="btn btn-secondary">Reset</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form> --}}
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