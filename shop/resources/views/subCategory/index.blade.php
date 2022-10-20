@extends('layouts.admin')
@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>SubCategories</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($subCategories as $subCategory)
                        <li class="list-group-item">
                            <div class="items-list">
                                <div class="content">
                                    <h2>{{$subCategory->sub_category}}</h2>
                                    <small>[Items: {{$subCategory->items()->count()}}]</small>
                                </div>
                                <div class="buttons">
                                    <a href="{{route('subc_show', $subCategory)}}" class="btn btn-info">Show</a>
                                    <a href="{{route('subc_edit', $subCategory)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('subc_delete', $subCategory)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </li>
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