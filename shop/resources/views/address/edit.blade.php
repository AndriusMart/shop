@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="header-back">
                    <h2>Change Category</h2>
                </div>
                </div>
                <div class="card-body">
                    <form action="{{route('ua_update', $userAddress)}}" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text">address</span>
                            <input type="text" name="address" class="form-control" value="{{old('address', $userAddress->address)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">city</span>
                            <input type="text" name="city" class="form-control" value="{{old('city', $userAddress->city)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">postal code</span>
                            <input type="text" name="postal_code" class="form-control" value="{{old('postal_code', $userAddress->postal_code)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">phone</span>
                            <input type="text" name="phone" class="form-control" value="{{old('phone', $userAddress->phone)}}">
                        </div>
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-secondary mt-4">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection