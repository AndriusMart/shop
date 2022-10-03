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
    <h2 class="title">Naujos prekės</h2>
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
                  <a href="{{route('m_show', $item)}}">buy now</a>
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
    <h2 class="title">Naujos prekės</h2>
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
                  <a href="{{route('m_show', $item)}}">buy now</a>
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
      <h2>Naujiena!</h2>
      <h4>Registruoti kientai gauna 5% nuolaidą</h4>
      <a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>Registruokis dabar!<i class="fa fa-arrow-left"
          aria-hidden="true"></i></a>
    </div>

  </section>



  <!-- register info -->
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
  <!-- js -->
</body>
@endsection