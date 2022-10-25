@extends('layouts.main')


@section('content')
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
        @foreach(session('cart') as $id => $details)
        @php $total += $details['price'] * $details['quantity'] @endphp
        <tr data-id="{{ $id }}">
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="100" height="100"
                            class="img-responsive" /></div>
                    <div class="col-sm-9">
                        <h4 class="nomargin">{{ $details['name'] }}</h4>
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
            {{-- {{dd(Auth::user()->getAddress->first()) == null}} --}}
            <td colspan="5" class="text-right">
                @if(!Auth::user()->getAddress->first())
                    <div>
                        To make an order,
                        you need to add your address first
                        <a class="btn btn-dark" href="{{ route('ua_create') }}">add</a>
                    </div>
                    @endif
                <a href="{{route('index')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
                    Shopping</a>
                @if(Auth::user())
                @forelse($addresses as $address)
                {{-- {{dd($address->getUsers)}} --}}
                @if(Auth::user()->id == $address->getUsers->id) <form action="{{route('o_store')}}" method="post"
                    enctype="multipart/form-data">
                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                    <input type="hidden" value="{{$status[1]}}" name="status">
                    <input type="hidden" value="{{ $total }}" name="total">
                    @csrf
                    <button type="submit" class="btn btn-secondary mt-4">Order</button>
                    </form>
                    @endif
                    @empty
                    @endforelse
                    @else
                    <div>
                        You have to login fist to make an order


                        <a class="btn btn-dark" href="{{ route('login') }}">{{ __('Login') }}</a>



                        <a class="btn btn-dark" href="{{ route('register') }}">{{ __('Register') }}</a>


                    </div>
                    @endif
            </td>
        </tr>
    </tfoot>
    @endif
</table>
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