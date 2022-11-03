@extends('layouts.main')

@section('content')
<!-- nav-side -->
<div class="section-space"></div>
<div class="section-space-small"></div>
<div class="items bg-foto">
  <!-- list items -->
  <div class="col-9 bg-foto">
    <div class="list-items">

      <div>
        <div class="filter">
          <div class="card filter">
        <span class="fs-5 fw-semibold">Filter</span>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <form action="{{route('list')}}" method="get">
                <div class="container">
                  <div class="row">
                    <div class="col-12">
                      <small>Categories</small>
                      <select name="cat" class="form-select mt-1">
                        <option value="0">All</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($cat==$category->id) selected @endif>{{$category->category}}
                        </option>
    
                        @endforeach
                      </select>
                    </div>
                    <div class="col-12">
                      <small>Sub categories</small>
                      <select name="subCat" class="form-select mt-1">
                        <option value="0">All</option>
                        @foreach($subCategories as $subcategory)
                        <option value="{{$subcategory->id}}" @if($subCat==$subcategory->id) selected
                          @endif>{{$subcategory->sub_category}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-12">
                      <small>Price</small>
                      <select name="sort" class="form-select mt-1">
                        <option value="0">All</option>
                        @foreach($sortSelect as $option)
                        <option value="{{$option[0]}}" @if($sort==$option[0]) selected @endif>{{$option[1]}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-8">
                      <button type="submit" class="input-group-text mt-1">Filter</button>
                    </div>
                </div>
                </div>
              </form>
            </div>
            <span class="fs-5 fw-semibold">Search</span>
            <div class="col-12  mt-1">
              <form action="{{route('list')}}" method="get">
              <div class="input-group mb-3">
                <input type="text" name="s" class="form-control" value="{{$s}}">
                <button type="submit" class="input-group-text">Search</button>
              </div>
            </form>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
      @forelse($items as $item)
      <div class="">
        <div class="  carousel-border">
          <div class="card">
            <div class="card-img ">
              
              {{-- {{dump(!$item->photo)}} --}}
              @if(!$item->photo)
              <img src="../public/item/nophoto.jpg" class="img-fluid" />
              @else
              <img src="{{$item->photo}}" class="img-fluid" />
              @endif
            </div>
            <div class="carusel-tag ">
              <h3>{{$item->title}}</h3>
              <p>{{$item->getCategory->category}}</p>
              <p>{{$item->getSubCategory->sub_category}}</p>
              <h2>{{$item->price}}</h2>
            </div>
            <div class="buy-see overlay">
              <input type="hidden" value="{{ $item->id }}" name="id">
              <input type="hidden" value="{{ $item->title}}" name="name">
              <input type="hidden" value="{{ $item->photo }}" name="image">
              <input type="hidden" value="{{$item->price}}" name="price">
              <input type="hidden" value="1" name="quantity">
              <p class="btn-holder"><a href="{{ route('add.to.cart', $item->id) }}"
                  class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                  <p class="btn-holder"><a href="{{route('show', $item)}}" class="btn btn-warning btn-block text-center" role="button">Info</a> </p> 
            </div>
          </div>

        </div>
      </div>
      @empty
      <h1 class="list-group-item">No items found</h1>
      @endforelse

    </div>
    <div class=" mt-3">
      {{ $items->links() }}
    </div>
  </div>
  
</div>
<!-- nav-side -->
<div class="section-space"></div>
<div class="section-space"></div>

</body>
@endsection