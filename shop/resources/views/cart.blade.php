@extends('layouts.main')


@section('content')
<div class="section-space"></div>
<div class="section-space-small"></div>
<table id="cart" class="table table-hover table-condensed bg">
    <tbody>
        @if(!session('cart'))
        <section class="hero new">
            <div class="new-info ">
                <h2>Your cart is empty!</h2>
                <h4>You need to add items to your cart to place an order</h4>
                <a href="{{'list'}}"><i class="fa fa-arrow-right" aria-hidden="true"></i>Go shopping<i
                        class="fa fa-arrow-left" aria-hidden="true"></i></a>
            </div>

        </section>
        @endif
        @php $total = 0 @endphp
        @if(session('cart'))
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        @foreach(session('cart') as $id => $details)
        @php $total += $details['price'] * $details['quantity'] @endphp
        <tr data-id="{{ $id }}">
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] ?? asset('item/nophoto.jpg')}}"
                            width="100" height="100" class="img-responsive" /></div>
                    <div class="col-sm-9">
                        <a href="{{route('show', $id)}}">
                            <h4 class="nomargin">{{ $details['name'] }}</h4>
                        </a>
                    </div>
                </div>
            </td>
            <td data-th="Price">${{ $details['price'] }}</td>
            <td data-th="Quantity">
                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
            </td>
            <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
            <td class="actions" data-th="">
                <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <h3><strong>Total ${{ $total }}</strong></h3>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                @endif
                @if(session('cart'))
                <a href="{{route('index')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
                    Shopping</a>
                @if(Auth::user())
                {{-- {{dd(!Auth::user()->getAddress->first())}} --}}
                @if(Auth::user()->getAddress->first()) <form action="{{route('o_store')}}" method="post"
                    enctype="multipart/form-data">
                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                    <input type="hidden" value="{{$status[1]}}" name="status">
                    <input type="hidden" value="{{ $total }}" name="total">
                    @csrf
                    <button type="submit" class="btn btn-secondary mt-4">Order</button>
                </form>
                @elseif(!Auth::user()->getAddress->first())
                <div>
                    To make an order,
                    you need to add your address first
                    <a class="btn btn-dark" href="{{ route('ua_create') }}">add</a>
                </div>
                @endif
                @else
                <div>
                    You have to login fist to make an order
                    <a class="btn btn-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                    <a class="btn btn-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                </div>
                @endif
                @endif

            </td>
        </tr>
    </tfoot>
</table>
<div class="section-space"></div>
@endsection





@section('scripts')
<script type="text/javascript">
    $(".update-cart").change(function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
   
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
   
</script>
@endsection