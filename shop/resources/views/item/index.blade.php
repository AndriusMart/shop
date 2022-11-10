@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Item</h2>
                </div>
                    <span class="fs-5 fw-semibold">Filter</span>
                    <div class="container ">
                      <div class="row ">
                        <div class="col-12">
                          <form action="{{route('i_index')}}" method="get">
                            <div class="container filer-items">
                              <div class="row filer-items">
                                <div class="col-2 filter-bars">
                                  <small>Categories</small>
                                  <select name="cat" class="form-select mt-1">
                                    <option value="0">All</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($cat==$category->id) selected @endif>{{$category->category}}
                                    </option>
                
                                    @endforeach
                                  </select>
                                </div>
                                <div class="col-2 filter-bars">
                                  <small>Sub categories</small>
                                  <select name="subCat" class="form-select mt-1">
                                    <option value="0">All</option>
                                    @foreach($subCategories as $subcategory)
                                    <option value="{{$subcategory->id}}" @if($subCat==$subcategory->id) selected
                                      @endif>{{$subcategory->sub_category}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="col-2 filter-bars">
                                  <small>Order By</small>
                                  <select name="sort" class="form-select mt-1">
                                    @foreach($sortSelect as $option)
                                    <option value="{{$option[0]}}" @if($sort==$option[0]) selected @endif>{{$option[1]}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="col-2 filter-bars">
                                  <small>Items per page</small>
                                  <select name="per_page" class="form-select mt-1">
                                    <option value="24" @if('24'==$perPage) selected @endif>24</option>
                                    <option value="12" @if('12'==$perPage) selected @endif>12</option>
                                    <option value="50" @if('50'==$perPage) selected @endif>50</option>
                                </select>
                                </div>
                                <div class="col-2 mt-4">
                                  <button type="submit" class="input-group-text mt-1">Filter</button>
                                </div>
                            </div>
                            </div>
                          </form>
                        </div>
                        <span class="fs-5 ml-3 fw-semibold">Search</span>
                        <div class="col-4 ml-3 mt-1">
                          <form action="{{route('list')}}" method="get">
                          <div class="input-group mb-3 " >
                            <input type="text" name="s" class="form-control" value="{{$s}}">
                            <button type="submit" class="input-group-text">Search</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($items as $item)
                        <li class="list-group-item">
                            <div class="items-list">
                                <div class="content">
                                    <h5><span>category:</span><a style="text-decoration: none" href="{{route('c_show', $item->getCategory->id)}}"><h2>{{$item->getCategory->category}}</a></h5>
                                    <h5><span>Subcategory:</span><a style="text-decoration: none" href="{{route('subc_show', $item->getSubCategory->id)}}">{{$item->getSubCategory->sub_category}}</a></h5>
                                    <h4><span>title: </span>{{$item->title}}</h4>
                                    <h4><span>Price: </span>{{$item->price}}</h4>
                                    <h4>{{$item->rating ?? 'X'}}<i class="fa fa-star"></i></h4>
                                    @if($item->photo)
                                    <h5><a href="{{$item->photo}}" target="_BLANK">Photo</a></h5>
                                    @endif
                                </div>
                                <div class="buttons">
                                    <a href="{{route('show', $item)}}" class="btn btn-info">Show</a>
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
        <div class=" mt-3">
            {{ $items->links() }}
          </div>
    </div>
    
</div>
@endsection