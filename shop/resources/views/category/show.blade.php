@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Category</h2>
                    <a href="{{route('c_index')}}" class="close"><span class="sr-only">Close</span></a>
                </div>
                <div class="card-body">
                    <div class="category">
                        <h5>{{$category->category}}</h5>
                    </div>
                    <ul class="list-group">
                        @forelse($category->subCategories as $subCategory)
                        <li class="list-group-item">
                            <div class="movies-list">
                                <div class="content">
                                    <h2><span>SubCategory: </span>{{$subCategory->sub_category}}</h2>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No SubCategories found</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection