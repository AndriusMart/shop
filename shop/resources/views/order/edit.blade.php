@extends('layouts.main')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <div class="header-back">
                    <h2>edit order</h2>
                </div>
                </div>
                <div class="card-body">
                    <form action="{{route('o_update', $orders)}}" method="post">
                        <select data-edit name="status" class="form-select mb-3 mt-3">
                            @foreach($status as $stat)
                            <option value="{{$stat}}" @if($stat == $orders->status) selected @endif>{{$stat}}</option>
                            @endforeach
                        </select>
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