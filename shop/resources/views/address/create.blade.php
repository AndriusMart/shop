@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Add Address</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('ua_store')}}" method="post">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                        <div class="input-group mb-3">
                            <span class="input-group-text">address</span>
                            <input type="text" name="address" class="form-control" value="{{old('address')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">city</span>
                            <input type="text" name="city" class="form-control" value="{{old('city')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">postal code</span>
                            <input type="text" name="postal_code" class="form-control" value="{{old('postal_code')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">phone</span>
                            <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-secondary mt-4">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection