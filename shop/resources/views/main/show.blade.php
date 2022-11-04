@extends('layouts.main')

@section('content')

<body>
    <div class="section-space"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="header-back">
                            <h2>Item</h2>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="posts-list show-bg">
                            <div class="content">
                                <div class="truck-show ">
                                    <div class="show-l ">
                                        <div class="show-info bg">
                                        <div class="line"><span>category: </span>
                                            <h5>{{$items->getCategory->category}}</h5>
                                        </div>
                                        <div class="line"><span>sub_category: </span>
                                            <h5>{{$items->getSubCategory->sub_category}}</h5>
                                        </div>
                                        <div class="line"><span>title: </span>
                                            <h5>{{$items->title}}</h5>
                                        </div>
                                        <div class="line"><span>price: </span>
                                            <h5>{{$items->price}}</h5>
                                        </div>
                                        <div class="line"><span>rating: </span>
                                            <h5>{{$items->rating ?? 'X'}}</h5>
                                        </div>
                                    </div>
                                        <div class="show-img ">
                                            @if(!$items->photo)
                                            <img src="<?= asset('item/nophoto.jpg') ?>" alt="nophoto">
                                            @else
                                            <img src="{{$items->photo}}"  />
                                            @endif
                                        </div>
                                    </div>
                                    <h2 class="title">About!</h2>
                                    <div class="line">
                                        <p>{{$items->about}}</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="hidden" value="{{ $items->id }}" name="id">
                                <input type="hidden" value="{{ $items->title}}" name="name">
                                <input type="hidden" value="{{ $items->photo }}" name="image">
                                <input type="hidden" value="{{$items->price}}" name="price">
                                <input type="hidden" value="1" name="quantity">
                                <p class="btn-holder"><a href="{{ route('add.to.cart', $items->id) }}"
                                        class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                            </div>
                        </div>
                        @php
                            $votes = json_decode($items->votes ?? json_encode([]));
                        @endphp
                        @if(in_array(Auth::user()->id, $votes))
                            <div>You already rated this item</div>
                            
                        @else
                         <form action="{{route('rate', $items)}}" method="post">
                            <select name="rate">
                                @foreach(range(1, 10) as $value)
                                <option value="{{$value}}">{{$value}}</option>
                                @endforeach
                            </select>
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-info">Rate</button>
                        </form>
                        @endif
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-space"></div>
</body>
@endsection