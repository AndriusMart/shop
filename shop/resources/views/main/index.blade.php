@extends('layouts.main')

@section('content')

<body>
  <!-- hero -->
  <section class="hero hero-content">
    <div>
      <h2 class="hero-wellcome">WELLCOME TO</h2>
      <h1 class="hero-title">E-SHOP</h1>
      <a class="shop-now">Shop now.</a>
    </div>
  </section>
  <div class="hero-low" id="services_block"></div>

  <!-- hero -->
  <div class="section-space-small"></div>
  <!-- new items -->
  <div class="container text-center my-3 carousel-padding">
    <h2 class="title">New Items!</h2>
    <div class="row mx-auto my-auto justify-content-center">
      <div id="newCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" role="listbox">
          @forelse($items as $item)
          <div class="carousel-item active">
            <div class="col-md-3 carousel-border">
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
                  <input type="hidden" value="{{ $item->photo }}"  name="image">
                  <input type="hidden" value="{{$item->price}}"  name="price">
                  <input type="hidden" value="1" name="quantity">
                  <p class="btn-holder"><a href="{{ route('add.to.cart', $item->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p> 
                  <p class="btn-holder"><a href="{{route('show', $item)}}" class="btn btn-warning btn-block text-center" role="button">Info</a> </p> 
                </div>
              </div>
            </div>
          </div>
          @empty
          <h1 class="list-group-item">No items found</h1>
          @endforelse
        </div>
        <a class="carousel-control-prev bg-transparent w-aut" href="#newCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next bg-transparent w-aut" href="#newCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
      </div>
    </div>
  </div>
  <!-- new items -->
  <div class="section-space"></div>
  <!-- popular items -->
  <div class="container text-center my-3 carousel-padding">
    <h2 class="title">Most Rated!</h2>
    <div class="row mx-auto my-auto justify-content-center">
      <div id="popularCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" role="listbox">
          @forelse($items as $item)
          <div class="carousel-item active">
            <div class="col-md-3 carousel-border">
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
                  <input type="hidden" value="{{ $item->photo }}"  name="image">
                  <input type="hidden" value="{{$item->price}}"  name="price">
                  <input type="hidden" value="1" name="quantity">
                  <p class="btn-holder"><a href="{{ route('add.to.cart', $item->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p> 
                  <p class="btn-holder"><a href="{{route('show', $item)}}" class="btn btn-warning btn-block text-center" role="button">Info</a> </p> 
                </div>
              </div>
            </div>
          </div>
          @empty
          <h1 class="list-group-item">No items found</h1>
          @endforelse

        </div>
        <a class="carousel-control-prev bg-transparent w-aut" href="#popularCarousel" role="button"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next bg-transparent w-aut" href="#popularCarousel" role="button"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
      </div>
    </div>
  </div>
  <!-- popular items -->
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
  <!-- footer -->
  <section class="footer">
    <div class="footer-links">
      <a href="#">Privacy policy</a>
      <a href="#">Shipping and returning</a>
      <a href="#">Shop</a>
      <a href="#">Woman</a>
      <a href="#">Man</a>
    </div>
    <div class="footer-info">
      <div class="footer-info-each">
        <a href="#">
          <div class="footer-f">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <p>Adress:</p>
          </div>
          <span>Samsasas g. 855, Vilnius</span>
        </a>
      </div>

      <div class="footer-info-each">
        <a href="#">
          <div class="footer-f">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <p>Phone:</p>
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
  <!-- js -->
  <script src="http://localhost/shop/shop/resources/js/components/services.js"></script>
  <script src="http://localhost/shop/shop/resources/js/data/servicesData.js"></script>
</body>
@endsection