@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one mt-5">{{ config('app.name') }}</h1>
                <p>Smoke, clouds, lol</p>
                <br>
                <a href="/products" class="btn btn-outline-primary">Show sheeesh</a>
            </div>
        </div>
    </div>
@endsection
