@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-7">
            <div class="card">
                <div class="card-header">
                    <h2>New Item</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('i_store')}}" method="post" enctype="multipart/form-data">

                        <select name="category_id" class="form-select mt-3">
                            <option value="0">Choose Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($category->category == old('category')) selected
                                @endif>{{$category->category}}</option>
                            @endforeach
                        </select>
                        <select name="sub_category_id" class="form-select mt-3 mb-3">
                            <option value="0">Choose Subcategory</option>
                            @foreach($subCategories as $subCategory)
                            <option value="{{$subCategory->id}}" @if($subCategory->sub_category == old('sub_category'))
                                selected
                                @endif>{{$subCategory->sub_category}}</option>
                            @endforeach
                        </select>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Title</span>
                            <input type="text" name="title" class="form-control" value="{{old('title')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">About</span>
                            <textarea class="form-control" name="about">{{old('about')}}</textarea>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Price</span>
                            <input type="text" name="price" class="form-control" value="{{old('price')}}">
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-text">Item photo</span>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-secondary mt-4">Create</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4">


            <div>
                <div class="card">
                    <div class="card-header">
                        <h2>New category</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('c_store')}}" method="post" enctype="multipart/form-data">
                            <div class="input-group mb-3">
                                <span class="input-group-text">category</span>
                                <input type="text" name="category" class="form-control" value="{{old('category')}}">
                            </div>
                            @csrf
                            <button type="submit" class="btn btn-secondary mt-4">Create</button>
                        </form>
                    </div>
                </div>
            </div>
            <div>
                <div class="card">
                    <div class="card-header">
                        <h2>New subcategory</h2>
                    </div>
                    <div class="card-body">
                    <form action="{{route('subc_store')}}" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Sub category</span>
                            <input type="text" name="sub_category" class="form-control" value="{{old('sub_category')}}">
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-secondary mt-4">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection