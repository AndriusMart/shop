@extends('layouts.main')

@section('content')

<body>
  <!-- hero -->
  <section class="hero hero-content">
    <div>
      <h2 class="hero-wellcome">WELLCOME TO</h2>
      <h1 class="hero-title">E-SHOP</h1>
      <a href="{{route('list')}}" class="shop-now">Shop now.</a>
    </div>
  </section>
  <div class="hero-low" id="services_block"></div>

  <!-- hero -->
  <div class="section-space-small"></div>
  <!-- new items -->
  <div class="text-center my-3">
    <h2 class="title">New Items!</h2>
    <div class="row mx-auto my-auto justify-content-center">
      <div id="carouselNew" class="carousel" data-bs-ride="carousel">
        <div class="carousel-inner">
          @forelse($items as $item)
          <div class="carousel-item active">
            <div class="card">
              @if(!$item->photo)
              <img src="../public/item/nophoto.jpg" class="img-fluid" />
              @else
              <img src="{{$item->photo}}" class="img-fluid" />
              @endif
              <div class="carusel-tag ">
                <h3>{{$item->title}}</h3>
                <p>{{$item->getCategory->category}}</p>
                <p>{{$item->getSubCategory->sub_category}}</p>

                <h2>{{$item->price}}$</h2>
              </div>
              <div class="buy-see overlay">
                <input type="hidden" value="{{ $item->id }}" name="id">
                <input type="hidden" value="{{ $item->title}}" name="name">
                <input type="hidden" value="{{ $item->photo }}" name="image">
                <input type="hidden" value="{{$item->price}}" name="price">
                <input type="hidden" value="1" name="quantity">
                <p class="btn-holder"><a href="{{ route('add.to.cart', $item->id) }}"
                    class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                <p class="btn-holder"><a href="{{route('show', $item)}}" class="btn btn-warning btn-block text-center"
                    role="button">Info</a> </p>
              </div>
            </div>
          </div>
          @empty
          <h1 class="list-group-item">No items found</h1>
          @endforelse
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselNew" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselNew" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
  <!-- new items -->
  <div class="section-space"></div>
  <!-- best rated items -->
  <div class="text-center my-3">
    <h2 class="title">best rated Items!</h2>
    <div class="row mx-auto my-auto justify-content-center">
      <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
        <div class="carousel-inner">
          @forelse($rated as $rate)
          <div class="carousel-item active">
            <div class="card">
              @if(!$rate->photo)
              <img src="../public/item/nophoto.jpg" class="img-fluid" />
              @else
              <img src="{{$rate->photo}}" class="img-fluid" />
              @endif
              <div class="carusel-tag ">
                <h3>{{$rate->title}}</h3>
                <h3>{{$rate->rating ?? 'X'}} <i class="fa fa-star"></i></h3>
                <p>{{$rate->getCategory->category}}</p>
                <p>{{$rate->getSubCategory->sub_category}}</p>

                <h2>{{$rate->price}}$</h2>
              </div>
              <div class="buy-see overlay">
                <input type="hidden" value="{{ $rate->id }}" name="id">
                <input type="hidden" value="{{ $rate->title}}" name="name">
                <input type="hidden" value="{{ $rate->photo }}" name="image">
                <input type="hidden" value="{{$rate->price}}" name="price">
                <input type="hidden" value="1" name="quantity">
                <p class="btn-holder"><a href="{{ route('add.to.cart', $rate->id) }}"
                    class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                <p class="btn-holder"><a href="{{route('show', $rate)}}" class="btn btn-warning btn-block text-center"
                    role="button">Info</a> </p>
              </div>
            </div>
          </div>
          @empty
          <h1 class="list-group-item">No items found</h1>
          @endforelse
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
  <!-- bets rated items -->
  <!-- register info -->
  <section class="hero new">
    <div class="new-info ">
      <h2>Important!</h2>
      <h4>You have to be registered to make an order</h4>
      <a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>Register now!<i class="fa fa-arrow-left"
          aria-hidden="true"></i></a>
    </div>

  </section>
  <!-- register info -->
  <!-- js -->
</body>
<script>
  
//  main index carusel "best rated"
var multipleCardCarousel = document.querySelector(
  "#carouselExampleControls"
);
if (window.matchMedia("(min-width: 768px)").matches) {
  var carousel = new bootstrap.Carousel(multipleCardCarousel, {
    interval: false,
  });
  var carouselWidth = $(".carousel-inner")[0].scrollWidth;
  var cardWidth = $(".carousel-item").width();
  var scrollPosition = 0;
  $("#carouselExampleControls .carousel-control-next").on("click", function () {
    if (scrollPosition < carouselWidth - cardWidth * 0) {
      scrollPosition += cardWidth;
      $("#carouselExampleControls .carousel-inner").animate(
        { scrollLeft: scrollPosition },
        600
      );
    }
  });
  $("#carouselExampleControls .carousel-control-prev").on("click", function () {
    if (scrollPosition > 0) {
      scrollPosition -= cardWidth;
      $("#carouselExampleControls .carousel-inner").animate(
        { scrollLeft: scrollPosition },
        600
      );
    }
  });
} else {
  $(multipleCardCarousel).addClass("slide");
}
//  main index carousel "new items"
var multipleCardCarousel = document.querySelector(
  "#carouselNew"
);
if (window.matchMedia("(min-width: 768px)").matches) {
  var carousel = new bootstrap.Carousel(multipleCardCarousel, {
    interval: false,
  });
  var carouselWidth = $(".carousel-inner")[0].scrollWidth;
  var cardWidth = $(".carousel-item").width();
  var scrollPosition = 0;
  $("#carouselNew .carousel-control-next").on("click", function () {
    if (scrollPosition < carouselWidth - cardWidth * 1) {
      scrollPosition += cardWidth;
      $("#carouselNew .carousel-inner").animate(
        { scrollLeft: scrollPosition },
        600
      );
    }
  });
  $("#carouselNew .carousel-control-prev").on("click", function () {
    if (scrollPosition > 0) {
      scrollPosition -= cardWidth;
      $("#carouselNew .carousel-inner").animate(
        { scrollLeft: scrollPosition },
        600
      );
    }
  });
} else {
  $(multipleCardCarousel).addClass("slide");
}

</script>
@endsection