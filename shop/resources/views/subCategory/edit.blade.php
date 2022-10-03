@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <div class="header-back">
                    <h2>Change SubCategory</h2>
                </div>
                </div>
                <div class="card-body">
                    <form action="{{route('subc_update', $subCategory)}}" method="post" >
                        <div class="input-group mb-3">
                            <span class="input-group-text">Sub category</span>
                            <input type="text" name="sub_category" class="form-control" value="{{old('sub_category')}}">
                        </div>
                        <select name="category_id" class="form-select mt-3">
                            <option value="0">Choose Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($category->category == old('category')) selected
                                @endif>{{$category->category}}</option>
                            @endforeach
                        </select>
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-secondary mt-4">update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection