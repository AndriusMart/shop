@extends('layouts.main')

@section('content')
<!-- nav-side -->
<div class="section-space"></div>
<div class="col-7">
  <div class="container">
    <div class="row">
      <div class="col-8">
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
<div class="section-space-small"></div>
<div class="items bg-foto">
  <div class="flex-shrink-0 p-3 col-3 categor">
    <svg class="bi pe-none me-2" width="30" height="24">
      <use xlink:href="#bootstrap"></use>
    </svg>
    <span class="fs-5 fw-semibold">Categories</span>
    <div class="container">
      <div class="row">
        <div class="col-11">
          <form action="{{route('list')}}" method="get">
            <div class="container">
              <div class="row">
                @foreach($categories as $category)
                <option value="{{$category->id}}" @if($cat==$category->id) selected @endif>{{$category->category}}
                </option>
                @endforeach
                <div class="col-8">
                  <select name="cat" class="form-select mt-1">
                    <option value="0">All</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($cat==$category->id) selected @endif>{{$category->category}}
                    </option>

                    @endforeach
                  </select>
                </div>
                <div class="col-8">
                  <select name="subCat" class="form-select mt-1">
                    <option value="0">All</option>
                    @foreach($subCategories as $subcategory)
                    <option value="{{$subcategory->id}}" @if($subCat==$subcategory->id) selected
                      @endif>{{$subcategory->sub_category}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-8">
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
      </div>
    </div>
  </div>
  <!-- list items -->
  <div class="col-9 bg-foto">
    <div class="list-items">
      @forelse($items as $item)
      <div class="">
        <div class="  carousel-border">
          <div class="card">
            <div class="card-img ">
              <img src="{{$item->photo}}" class="img-fluid" />
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
            </div>
          </div>

        </div>
      </div>
      @empty
      <h1 class="list-group-item">No items found</h1>
      @endforelse

    </div>
    <div class="me-3 mx-3">
      {{ $items->links() }}
    </div>
  </div>
</div>
<!-- nav-side -->
<div class="section-space"></div>
<div class="section-space"></div>
<!-- footer -->
<section class="footer">
  <div class="footer-links">
    <a href="#">Privatumo Politika</a>
    <a href="#">Pristatymas ir grąžinimas</a>
    <a href="#">Parduotuvė</a>
    <a href="#">Moterims</a>
    <a href="#">Vyrams</a>
  </div>
  <div class="footer-info">
    <div class="footer-info-each">
      <a href="#">
        <div class="footer-f">
          <i class="fa fa-map-marker" aria-hidden="true"></i>
          <p>Adresas:</p>
        </div>
        <span>Samsasas g. 855, Vilnius</span>
      </a>
    </div>

    <div class="footer-info-each">
      <a href="#">
        <div class="footer-f">
          <i class="fa fa-phone" aria-hidden="true"></i>
          <p>Telefonas:</p>
        </div>
        <span>+306555655655</span>
      </a>
    </div>

    <div class="footer-info-each">
      <a href="#">
        <div class="footer-f">
          <i class="fa fa-envelope" aria-hidden="true"></i>
          <p>Gmail:</p>
        </div>
        <span>E-SHOP@Gmail.com</span>
      </a>
    </div>
  </div>

</section>
<!-- footer -->
<a class="fa fa-angle-up back-to-top" href="#"></a>
</body>
@endsection