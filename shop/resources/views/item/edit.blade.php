@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Update item</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('i_update', $items )}}" method="post" enctype="multipart/form-data">
                        <select name="category_id" class="form-select mt-3">

                            @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($category->id == old('category', $items->category_id)) selected
                                @endif>{{$category->category}}</option>
                            @endforeach
                        </select>
                        <select name="sub_category_id" class="form-select mt-3 mb-3">

                            @foreach($subCategories as $subCategory)
                            <option value="{{$subCategory->id}}" @if($subCategory->id == old('sub_category',  $items->sub_category_id))
                                selected
                                @endif>{{$subCategory->sub_category}}</option>
                            @endforeach
                        </select>
                        <div class="input-group mb-3">
                            <span class="input-group-text">title</span>
                            <input type="text" name="title" class="form-control"
                                value="{{old('title', $items->title)}}">
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">about</span>
                            <textarea class="form-control"
                                name="about">{{old('about',$items->about)}}</textarea>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">price</span>
                            <input type="text" name="price" class="form-control"
                                value="{{old('price', $items->price)}}">
                        </div>
                        @if($items->photo)
                        <div class="img-small">
                            <img src="{{$items->photo}}" alt="item photo">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="del-photo" name="delete_photo">
                                <label class="form-check-label" for="del-photo">
                                  Delete photo
                                </label>
                              </div>
                        </div>
                        @else
                        <h5 class="input-group mt-3">no photo</h5>
                        @endif
                        <div class="input-group mt-3">
                            <span class="input-group-text">items photo</span>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-secondary mt-4">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection