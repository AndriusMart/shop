
                        @extends('layouts.app')

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
                                                    <div class="movies-list">
                                                        <div class="content">
                                                            <h2><span>title: </span>{{$item->title}}</h2>
                                                            <h4><span>price: </span>{{$item->price}}</h4>
                                                        </div>
                                                    </div>
                                                </li>
                                                @empty
                                                <li class="list-group-item">No item found</li>
                                                @endforelse
                                            </ul>
                                            {{-- <form action="{{route('c_delete_movies', $subCategory)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endsection